<?php

use App\Http\Middleware\Admin\RedirectIfAuthenticated;
use App\Http\Middleware\Admin\RedirectIfNotAuthenticated;
use Illuminate\Foundation\Configuration\Middleware;

return function (Middleware $middleware) {
    $middleware->appendToGroup('admin', [
        RedirectIfAuthenticated::class,
        RedirectIfNotAuthenticated::class,
    ]);

    $middleware->alias([
        'admin.guest' => RedirectIfAuthenticated::class,
        'admin.auth' => RedirectIfNotAuthenticated::class,
    ]);
};
