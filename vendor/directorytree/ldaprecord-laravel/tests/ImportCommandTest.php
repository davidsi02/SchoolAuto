<?php

namespace LdapRecord\Laravel\Tests;

use Illuminate\Support\Facades\Auth;
use LdapRecord\Laravel\LdapUserRepository;
use LdapRecord\Models\ActiveDirectory\User;
use LdapRecord\Query\Model\Builder;
use Mockery as m;

class ImportCommandTest extends DatabaseTestCase
{
    public function test_command_exits_when_invalid_provider_used()
    {
        $this->artisan('ldap:import', ['provider' => 'eloquent'])
            ->expectsOutput('Provider [eloquent] is not configured for LDAP authentication.')
            ->assertExitCode(0);
    }

    public function test_command_exits_when_plain_provider_is_used()
    {
        $this->setupPlainUserProvider();

        $this->artisan('ldap:import', ['provider' => 'ldap-plain'])
            ->expectsOutput('Provider [ldap-plain] is not configured for database synchronization.')
            ->assertExitCode(0);
    }

    public function test_message_is_shown_when_no_users_are_found_for_importing()
    {
        $this->setupDatabaseUserProvider();

        $repo = m::mock(LdapUserRepository::class, function ($repo) {
            $query = m::mock(Builder::class);
            $query->shouldReceive('paginate')->once()->andReturnSelf();
            $query->shouldReceive('toArray')->once()->andReturn([]);

            $repo->shouldReceive('query')->once()->andReturn($query);
        });

        $provider = $this->createDatabaseUserProvider($repo);

        Auth::shouldReceive('createUserProvider')->once()->withArgs(['ldap-database'])->andReturn($provider);

        $this->artisan('ldap:import', ['provider' => 'ldap-database'])
            ->expectsOutput('There were no users found to import.')
            ->assertExitCode(0);
    }

    public function test_users_are_imported_into_the_database()
    {
        $users = [
            new User([
                'cn' => 'Steve Bauman',
                'mail' => 'sbauman@test.com',
                'objectguid' => 'bf9679e7-0de6-11d0-a285-00aa003049e2',
            ]),
        ];

        $repo = m::mock(LdapUserRepository::class, function ($repo) use ($users) {
            $query = m::mock(Builder::class);
            $query->shouldReceive('paginate')->once()->andReturnSelf();
            $query->shouldReceive('toArray')->once()->andReturn($users);

            $repo->shouldReceive('query')->once()->andReturn($query);
        });

        $importer = $this->createLdapUserImporter(TestUserModelStub::class, [
            'sync_attributes' => ['name' => 'cn', 'email' => 'mail'],
        ]);

        $provider = $this->createDatabaseUserProvider($repo, $this->createLdapUserAuthenticator(), $importer);

        Auth::shouldReceive('createUserProvider')->once()->withArgs(['ldap-database'])->andReturn($provider);

        $this->artisan('ldap:import', ['provider' => 'ldap-database', '--no-interaction'])
            ->assertExitCode(0);

        $this->assertDatabaseHas('users', [
            'domain' => 'default',
            'name' => 'Steve Bauman',
            'email' => 'sbauman@test.com',
            'guid' => 'bf9679e7-0de6-11d0-a285-00aa003049e2',
        ]);
    }
}
