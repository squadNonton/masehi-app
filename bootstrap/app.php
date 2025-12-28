<?php

// Suppress deprecated warnings from PHP 8.5 on constants
error_reporting(E_ALL & ~E_DEPRECATED);

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e) {
            // Log the error first (Laravel does this by default but good to be sure)
            // If we want to hide ALL errors including 404, etc, we can catch everything.
            // But usually we just want to style 500s.
            // Let's rely on Laravel's behavior to look for views/errors/{code}.blade.php
            // But to be 100% sure we can force it or just creating the file is enough in Laravel 11.
            
            // However, user said "apapun itu jangan sampe user melihat error laravel".
            // So we can fallback to a safe page if it's not a validation error.
            if (app()->environment('local') && request()->is('debug/*')) {
                return false; // let default handler show for debug
            }
            
            // Check if view exists for specific error code, otherwise default to 500 style?
            // Actually, just creating resources/views/errors/500.blade.php is standard Laravel way.
            // But we want to catch ALL exceptions that bubble up to 500.
        });
    })->create();
