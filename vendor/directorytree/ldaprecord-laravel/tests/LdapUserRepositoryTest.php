<?php

namespace LdapRecord\Laravel\Tests;

use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\LdapUserRepository;
use LdapRecord\Models\Entry;
use LdapRecord\Query\Model\Builder;
use Mockery as m;

class LdapUserRepositoryTest extends TestCase
{
    public function test_model_can_be_created()
    {
        $model = (new LdapUserRepository(Entry::class))->createModel();
        $this->assertInstanceOf(Entry::class, $model);
    }

    public function test_query_can_be_created()
    {
        $repository = new LdapUserRepository(Entry::class);
        $query = $repository->query();
        $this->assertInstanceOf(Builder::class, $query);
        $this->assertInstanceOf(Entry::class, $query->getModel());
    }

    public function test_query_selects_are_merged()
    {
        $repository = new LdapUserRepository(Entry::class);
        $this->assertEquals(['*', 'objectguid', 'objectclass'], $repository->query()->getSelects());
    }

    public function test_find_by_credentials_returns_null_with_empty_array()
    {
        $repository = new LdapUserRepository(Entry::class);
        $this->assertNull($repository->findByCredentials());
    }

    public function test_find_by_credentials_ignores_password()
    {
        $repository = m::mock(LdapUserRepository::class, function ($repository) {
            $query = m::mock(Builder::class);
            $query->shouldNotReceive('where');
            $query->shouldReceive('first')->once()->andReturnNull();

            $repository->makePartial()->shouldAllowMockingProtectedMethods();
            $repository->shouldReceive('newModelQuery')->once()->andReturn($query);
        });

        $this->assertNull($repository->findByCredentials(['password' => 'secret']));
    }

    public function test_find_by_credentials_returns_model()
    {
        $user = new Entry();

        $repository = m::mock(LdapUserRepository::class, function ($repository) use ($user) {
            $query = m::mock(Builder::class);
            $query->shouldReceive('where')->withArgs(['username', 'foo'])->andReturnSelf();
            $query->shouldReceive('first')->once()->andReturn($user);

            $repository->makePartial()->shouldAllowMockingProtectedMethods();
            $repository->shouldReceive('newModelQuery')->once()->andReturn($query);
        });

        $this->assertSame($user, $repository->findByCredentials(['username' => 'foo']));
    }

    public function test_find_by_attribute_and_value_returns_model()
    {
        $repository = m::mock(LdapUserRepository::class, function ($repository) {
            $query = m::mock(Builder::class);
            $query->shouldReceive('findBy')->once()->withArgs(['foo', 'bar'])->andReturn('baz');

            $repository->makePartial()->shouldAllowMockingProtectedMethods();
            $repository->shouldReceive('newModelQuery')->once()->andReturn($query);
        });

        $this->assertSame('baz', $repository->findBy('foo', 'bar'));
    }

    public function test_find_by_model_returns_model()
    {
        $model = new \stdClass();

        $repository = m::mock(LdapUserRepository::class, function ($repository) use ($model) {
            $query = m::mock(Builder::class);
            $query->shouldReceive('findByGuid')->once()->withArgs(['guid'])->andReturn($model);

            $repository->makePartial()->shouldAllowMockingProtectedMethods();
            $repository->shouldReceive('newModelQuery')->once()->andReturn($query);
        });

        $authenticatable = m::mock(LdapAuthenticatable::class);
        $authenticatable->shouldReceive('getLdapGuid')->once()->andReturn('guid');

        $this->assertSame($model, $repository->findByModel($authenticatable));
    }

    public function test_find_by_guid_returns_model()
    {
        $repository = m::mock(LdapUserRepository::class, function ($repository) {
            $query = m::mock(Builder::class);
            $query->shouldReceive('findByGuid')->once()->withArgs(['guid'])->andReturn('foo');

            $repository->makePartial()->shouldAllowMockingProtectedMethods();
            $repository->shouldReceive('newModelQuery')->once()->andReturn($query);
        });

        $this->assertSame('foo', $repository->findByGuid('guid'));
    }
}
