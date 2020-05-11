<?php

namespace LdapRecord\Laravel\Tests;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use LdapRecord\Laravel\Auth\HasLdapUser;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;

class TestUserModelStub extends User implements LdapAuthenticatable
{
    use SoftDeletes, AuthenticatesWithLdap, HasLdapUser;

    protected $guarded = [];

    protected $table = 'users';
}
