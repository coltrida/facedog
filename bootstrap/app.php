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
        // Reindirizza gli utenti non autenticati (middleware 'auth')
        $middleware->redirectGuestsTo('/sign-in-advance'); // Reindirizza a un percorso specifico
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
