<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider

{
    protected $policies = [];


    public function boot()

    {
        $this->registerPolicies();

        /* define a warden user role */

        Gate::define('isManager', function ($user) {

            return $user->is_permission == '1';
        });

        /* define a student user role */

        Gate::define('isUser', function ($user) {

            return $user->is_permission == '0';
        });


        /* define a super admin role */

        Gate::define('isAdmin', function ($user) {

            return $user->is_permission == '2';
        });
        
    }
}
