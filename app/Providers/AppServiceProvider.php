<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */

    protected $policies = [];
    public function boot(): void
    {
        $this->registerPolicies();

        // Проверка роли администратора
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        // Просмотр поста
        Gate::define('view-post', function (User $user, Post $post) {
            return $user->role === 'admin' || $post->user_id === $user->id;
        });

        // Создание поста (доступно всем авторизованным)
        Gate::define('create-post', function (User $user) {
            return true;
        });

        // Обновление поста
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->role === 'admin' || $post->user_id === $user->id;
        });

        // Удаление поста
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->role === 'admin' || $post->user_id === $user->id;
        });
    }

    public function registerPolicies()
    {
        //
    }
}
