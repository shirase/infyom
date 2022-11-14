<?php

namespace App\Providers;

use App\Models\UserRole;
use App\Repositories\RoleRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('superuser', function ($user) {
            return $user->id == 1;
        });

        // superuser
        Gate::before(function ($user, $ability) {
            return $user->id == 1 ? true : null;
        });

        $roleRepository = $this->app->get(RoleRepository::class);
        foreach ($roleRepository->index() as $role) {
            Gate::define($role['role'], function ($user) use ($role) {
                return UserRole::query()->where('user_id', $user['id'])->where('role', $role['role'])->exists();
            });
        }
    }
}
