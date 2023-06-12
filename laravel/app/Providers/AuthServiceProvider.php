<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function(User $user) {
            return $user->cargo_id === 3;
        });

        Gate::define('seller', function(User $user) {
            return $user->cargo_id === 2;
        });

        Gate::define('bidder', function(User $user) {
            return $user->cargo_id === 1;
        });

        /*

        $roles = Role::all();

        foreach ($roles as $role) {
            Gate::define($role->name, function ($user) use ($role) {
                return $user->cargo_id === $role->id;
            });
        }*/
    }
}
