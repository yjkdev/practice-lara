<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 'view-admin-dashboard' 라는 이름의 게이트(규칙)를 정의합니다.
        Gate::define('view-admin-dashboard', function ($user) {
            // 사용자의 이메일이 'admin@example.com'이면 true(허락)를 반환합니다.
            return $user->email === 'tjftngus@naver.com';
        });
    }

    protected $policies = [
        Post::class => PostPolicy::class,
    ];
}
