<?php

namespace LdapRecord\Laravel\Tests;

use Illuminate\Support\Facades\Hash;
use LdapRecord\Laravel\LdapUserAuthenticator;
use LdapRecord\Laravel\LdapUserImporter;
use LdapRecord\Laravel\LdapUserRepository;
use Mockery as m;

class DatabaseUserProviderTest extends DatabaseTestCase
{
    use CreatesTestUsers;

    public function test_importer_can_be_retrieved()
    {
        $importer = new LdapUserImporter(TestUserModelStub::class, []);
        $provider = $this->createDatabaseUserProvider(
            $this->createLdapUserRepository(),
            $this->createLdapUserAuthenticator(),
            $importer
        );
        $this->assertSame($importer, $provider->getLdapUserImporter());
    }

    public function test_retrieve_by_id_uses_eloquent()
    {
        $model = $this->createTestUser([
            'name' => 'john',
            'email' => 'test@email.com',
            'password' => 'secret',
        ]);

        $provider = $this->createDatabaseUserProvider();

        $this->assertTrue($model->is($provider->retrieveById($model->id)));
    }

    public function test_retrieve_by_token_uses_eloquent()
    {
        $model = $this->createTestUser([
            'name' => 'john',
            'email' => 'test@email.com',
            'password' => 'secret',
            'remember_token' => 'token',
        ]);

        $provider = $this->createDatabaseUserProvider();

        $this->assertTrue($model->is($provider->retrieveByToken($model->id, $model->remember_token)));
    }

    public function test_update_remember_token_uses_eloquent()
    {
        $model = $this->createTestUser([
            'name' => 'john',
            'email' => 'test@email.com',
            'password' => 'secret',
            'remember_token' => 'token',
        ]);

        $provider = $this->createDatabaseUserProvider();

        $provider->updateRememberToken($model, 'new-token');
        $this->assertEquals('new-token', $model->fresh()->remember_token);
    }

    public function test_retrieve_by_credentials_returns_unsaved_database_model()
    {
        $credentials = ['samaccountname' => 'jdoe', 'password' => 'secret'];

        $ldapUser = $this->getMockLdapModel([
            'cn' => 'John Doe',
            'mail' => 'jdoe@test.com',
        ]);

        $repo = m::mock(LdapUserRepository::class);
        $repo->shouldReceive('findByCredentials')->once()->withArgs([$credentials])->andReturn($ldapUser);

        $provider = $this->createDatabaseUserProvider($repo);

        $databaseModel = $provider->retrieveByCredentials($credentials);
        $this->assertFalse($databaseModel->exists);
        $this->assertEquals('John Doe', $databaseModel->name);
        $this->assertEquals('jdoe@test.com', $databaseModel->email);
        $this->assertFalse(Hash::needsRehash($databaseModel->password));
    }

    public function test_validate_credentials_returns_false_when_no_database_model_is_set()
    {
        $databaseModel = new TestUserModelStub;

        $provider = $this->createDatabaseUserProvider();
        $this->assertFalse($provider->validateCredentials($databaseModel, ['password' => 'secret']));
        $this->assertFalse($databaseModel->exists);
    }

    public function test_validate_credentials_saves_database_model_after_passing()
    {
        $credentials = ['samaccountname' => 'jdoe', 'password' => 'secret'];

        $ldapUser = $this->getMockLdapModel([
            'cn' => 'John Doe',
            'mail' => 'jdoe@test.com',
        ]);

        $repo = m::mock(LdapUserRepository::class);
        $repo->shouldReceive('findByCredentials')->once()->withArgs([$credentials])->andReturn($ldapUser);

        $auth = m::mock(LdapUserAuthenticator::class);
        $auth->shouldReceive('setEloquentModel')->once()->withArgs([TestUserModelStub::class]);
        $auth->shouldReceive('attempt')->once()->withArgs([$ldapUser, 'secret'])->andReturnTrue();

        $provider = $this->createDatabaseUserProvider($repo, $auth);

        $databaseModel = $provider->retrieveByCredentials($credentials);
        $provider->validateCredentials($databaseModel, ['password' => 'secret']);
        $this->assertTrue($databaseModel->exists);
        $this->assertTrue($databaseModel->wasRecentlyCreated);
    }
}
