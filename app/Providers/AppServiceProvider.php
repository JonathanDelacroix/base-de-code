<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-product', function (User $user, Product $product) {
            return $product->user_id === $user->id;
        });

        Gate::define('view-product', function (?User $user, Product $product) {
            return $product->is_public || ($user && $product->user_id === $user->id);
        });
    }
}
