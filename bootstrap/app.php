<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: 'up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 모든 요청에 실행되는 글로벌 미들웨어 등록
        // $middleware->append(App\Http\Middleware\MyGlobalMiddleware::class);

        // 'web' 그룹에 미들웨어 추가
        // $middleware->appendToGroup('web', App\Http\Middleware\MyWebMiddleware::class);

        // 미들웨어에 별칭(alias) 부여
        $middleware->alias([
            'auth' => App\Http\Middleware\Authenticate::class,
            'guest' => App\Http\Middleware\RedirectIfAuthenticated::class,
            'throttle' => Illuminate\Routing\Middleware\ThrottleRequests::class,
            'ensure.version' => \App\Http\Middleware\EnsureAppVersionHeader::class,
            // 여기에 커스텀 미들웨어 별칭 추가 가능
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
