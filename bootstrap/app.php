<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        /* if you don't want middleware globaly or not want to make groups of middleware 
        so don't need to define here use middleware directly to the routes  */
        
        // global middleware 
        // $middleware->append(AgeCheck::class);

        $middleware->appendToGroup('check1', [
            AgeCheck::class,
            CountryCheck::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
