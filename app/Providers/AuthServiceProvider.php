<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use App\Policies\RolePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Product::class => ProductPolicy::class,
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Allow super_admin to bypass policies if you want (optional):
        Gate::before(function ($user, $ability) {
            if ($user->hasRole(config('filament-shield.super_admin.name', 'super_admin'))) {
                return true;
            }
        });
    }
}
