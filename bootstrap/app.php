<?php

use Illuminate\Http\Request;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\UserOnline;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Foundation\Application;
use Illuminate\Database\QueryException;
use App\Http\Middleware\TrackShopVisits;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'userOnline' => UserOnline::class,
            'checkRole' => CheckUserRole::class,
            'checkAdmin' => CheckAdmin::class,
            'track.visits' => TrackShopVisits::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Exception $exception, Request $request) {
            if ($exception instanceof NotFoundHttpException) {
                return response()->view("errors.404", [], 404);
            }

            if ($exception instanceof HttpException && $exception->getStatusCode() == 400) {
                return response()->view("errors.400", [], 400);
            }

            if ($exception instanceof HttpException && $exception->getStatusCode() == 403) {
                return response()->view("errors.403", [], 403);
            }

            if ($exception instanceof HttpException && $exception->getStatusCode() == 500) {
                return response()->view("errors.500", [], 500);
            }

            if ($exception instanceof QueryException) {
                return response()->view(
                    'errors.500',
                    ['message' => "Il y a un problème de connexion à la base de données."],
                    500
                );
            }

            if ($exception instanceof HttpException && $exception->getStatusCode() == 503) {
                return response()->view("errors.503", [], 503);
            }
        });
    })->create();
