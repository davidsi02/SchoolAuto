<?php

namespace LdapRecord\Models\Relations;

use LdapRecord\Models\Model;

class HasOne extends Relation
{
    /**
     * Get the results of the relationship.
     *
     * @return \LdapRecord\Query\Collection
     */
    public function getResults()
    {
        $model = $this->getForeignModelByValue(
            $this->parent->getFirstAttribute($this->relationKey)
        );

        return $this->transformResults(
            $this->parent->newCollection($model ? [$model] : null)
        );
    }

    /**
     * Attach a model instance to the parent model.
     *
     * @param Model $model
     *
     * @return Model|false
     */
    public function attach(Model $model)
    {
        return $this->parent->setAttribute(
            $this->relationKey,
            $this->getForeignValueFromModel($model)
        )->save() ? $model : false;
    }

    /**
     * Detach the related model from the parent.
     *
     * @return bool
     */
    public function detach()
    {
        return $this->parent->setAttribute(
            $this->relationKey,
            null
        )->save();
    }
}
