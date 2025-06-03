<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Đăng ký middleware TrackPageView vào nhóm 'web'
        $middleware->web(append: [
            \App\Http\Middleware\TrackPageView::class,
        ]);

        // Nếu bạn có các middleware khác trong nhóm 'web' bạn muốn thêm vào,
        // hãy đảm bảo chúng được liệt kê ở đây.
        // Ví dụ nếu bạn có TrustProxies middleware:
        // $middleware->web(append: [
        //     \App\Http\Middleware\TrustProxies::class,
        //     \App\Http\Middleware\TrackPageView::class,
        // ]);

        // Các cấu hình middleware khác có thể nằm ở đây (nếu có)
        // $middleware->alias([
        //     'auth' => \App\Http\Middleware\Authenticate::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();