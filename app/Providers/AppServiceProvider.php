<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // hanya admin yang boleh mengelola pengguna
        Gate::define('manage-users', function (User $user) {
            return $user->role === 'admin';
        });
    }
}