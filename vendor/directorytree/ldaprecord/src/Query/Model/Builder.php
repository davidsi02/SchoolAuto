<?php

namespace LdapRecord\Query\Model;

use DateTime;
use LdapRecord\Utilities;
use LdapRecord\Models\Model;
use LdapRecord\Models\Scope;
use LdapRecord\Models\Types\ActiveDirectory;
use LdapRecord\Query\Builder as BaseBuilder;
use LdapRecord\Models\ModelNotFoundException;

class Builder extends BaseBuilder
{
    /**
     * The model being queried.
     *
     * @var Model
     */
    protected $model;

    /**
     * The global scopes to be applied.
     *
     * @var array
     */
    protected $scopes = [];

    /**
     * The removed global scopes.
     *
     * @var array
     */
    protected $removedScopes = [];

    /**
     * The applied global scopes.
     *
     * @var array
     */
    protected $appliedScopes = [];

    /**
     * Sets the model instance for the model being queried.
     *
     * @param Model $model
     *
     * @return $this
     */
    public function setModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Returns the model being queried for.
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get a new model query builder instance.
     *
     * @param string|null $baseDn
     *
     * @return static
     */
    public function newInstance($baseDn = null)
    {
        return parent::newInstance($baseDn)->model($this->model);
    }

    /**
     * Finds a record using ambiguous name resolution.
     *
     * @param string|array $value
     * @param array|string $columns
     *
     * @return Model|\LdapRecord\Query\Collection|static|null
     */
    public function findByAnr($value, $columns = ['*'])
    {
        if (is_array($value)) {
            return $this->findManyByAnr($value, $columns);
        }

        // If we're not using ActiveDirectory, we can't use
        // ANR. We will make our own equivalent query.
        if (!$this->model instanceof ActiveDirectory) {
            return $this->prepareAnrEquivalentQuery($value)->first($columns);
        }

        return $this->findBy('anr', $value, $columns);
    }

    /**
     * Finds a record using ambiguous name resolution.
     *
     * If a record is not found, an exception is thrown.
     *
     * @param string       $value
     * @param array|string $columns
     *
     * @throws ModelNotFoundException
     *
     * @return Model
     */
    public function findByAnrOrFail($value, $columns = ['*'])
    {
        if ($entry = $this->findByAnr($value, $columns)) {
            return $entry;
        }

        throw ModelNotFoundException::forQuery($this->getUnescapedQuery(), $this->dn);
    }

    /**
     * Finds multiple records using ambiguous name resolution.
     *
     * @param array $values
     * @param array $columns
     *
     * @return \LdapRecord\Query\Collection
     */
    public function findManyByAnr(array $values = [], $columns = ['*'])
    {
        $this->select($columns);

        if (!$this->model instanceof ActiveDirectory) {
            foreach ($values as $value) {
                $this->prepareAnrEquivalentQuery($value);
            }

            return $this->get($columns);
        }

        return $this->findManyBy('anr', $values);
    }

    /**
     * Creates an ANR equivalent query for LDAP distributions that do not support ANR.
     *
     * @param string $value
     *
     * @return $this
     */
    protected function prepareAnrEquivalentQuery($value)
    {
        return $this->orFilter(function (self $query) use ($value) {
            foreach ($this->model->getAnrAttributes() as $attribute) {
                $query->whereEquals($attribute, $value);
            }
        });
    }

    /**
     * Finds a record by its string GUID.
     *
     * @param string       $guid
     * @param array|string $columns
     *
     * @return Model|static|null
     */
    public function findByGuid($guid, $columns = ['*'])
    {
        try {
            return $this->findByGuidOrFail($guid, $columns);
        } catch (ModelNotFoundException $e) {
            return;
        }
    }

    /**
     * Finds a record by its string GUID.
     *
     * Fails upon no records returned.
     *
     * @param string       $guid
     * @param array|string $columns
     *
     * @throws ModelNotFoundException
     *
     * @return Model|static
     */
    public function findByGuidOrFail($guid, $columns = ['*'])
    {
        if ($this->model instanceof ActiveDirectory) {
            $guid = Utilities::stringGuidToHex($guid);
        }

        return $this->whereRaw([
            $this->model->getGuidKey() => $guid,
        ])->firstOrFail($columns);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery()
    {
        $this->applyScopes();

        return parent::getQuery();
    }

    /**
     * Apply the global query scopes.
     *
     * @return $this
     */
    public function applyScopes()
    {
        if (!$this->scopes) {
            return $this;
        }

        foreach ($this->scopes as $identifier => $scope) {
            if (!isset($this->appliedScopes[$identifier])) {
                $scope instanceof Scope
                    ? $scope->apply($this, $this->getModel())
                    : $scope($this);

                $this->appliedScopes[$identifier] = $scope;
            }
        }

        return $this;
    }

    /**
     * Register a new global scope.
     *
     * @param string                            $identifier
     * @param \LdapRecord\Models\Scope|\Closure $scope
     *
     * @return $this
     */
    public function withGlobalScope($identifier, $scope)
    {
        $this->scopes[$identifier] = $scope;

        return $this;
    }

    /**
     * Remove a registered global scope.
     *
     * @param \LdapRecord\Models\Scope|string $scope
     *
     * @return $this
     */
    public function withoutGlobalScope($scope)
    {
        if (!is_string($scope)) {
            $scope = get_class($scope);
        }

        unset($this->scopes[$scope]);

        $this->removedScopes[] = $scope;

        return $this;
    }

    /**
     * Remove all or passed registered global scopes.
     *
     * @param array|null $scopes
     *
     * @return $this
     */
    public function withoutGlobalScopes(array $scopes = null)
    {
        if (!is_array($scopes)) {
            $scopes = array_keys($this->scopes);
        }

        foreach ($scopes as $scope) {
            $this->withoutGlobalScope($scope);
        }

        return $this;
    }

    /**
     * Get an array of global scopes that were removed from the query.
     *
     * @return array
     */
    public function removedScopes()
    {
        return $this->removedScopes;
    }

    /**
     * Get an array of the global scopes that were applied to the query.
     *
     * @return array
     */
    public function appliedScopes()
    {
        return $this->appliedScopes;
    }

    /**
     * Processes and converts the given LDAP results into models.
     *
     * @param array $results
     *
     * @return \LdapRecord\Query\Collection
     */
    protected function process(array $results)
    {
        return $this->model->hydrate(parent::process($results));
    }

    /**
     * {@inheritdoc}
     */
    protected function prepareWhereValue($field, $value, $raw = false)
    {
        if ($value instanceof DateTime) {
            $field = $this->model->normalizeAttributeKey($field);

            if (!$this->model->isDateAttribute($field)) {
                throw new \UnexpectedValueException(
                    "Cannot convert field [$field] to an LDAP timestamp. You must add this field as a model date."
                    .' Refer to https://ldaprecord.com/docs/model-mutators/#date-mutators'
                );
            }

            $value = $this->model->fromDateTime($this->model->getDates()[$field], $value);
        }

        return parent::prepareWhereValue($field, $value, $raw);
    }
}
