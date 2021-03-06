<?php

namespace Grofie\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
   

        //
    protected $dontReport = [
     \Illuminate\Auth\AuthenticationException::class,
     \Illuminate\Auth\Access\AuthorizationException::class,
     \Symfony\Component\HttpKernel\Exception\HttpException::class,
     \Illuminate\Database\Eloquent\ModelNotFoundException::class,
     \Illuminate\Session\TokenMismatchException::class,
     \Illuminate\Validation\ValidationException::class,
];
//
//
public function render($request, Exception $exception)
{
    return parent::render($request, $exception);
}
    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
 protected function unauthenticated($request, AuthenticationException $exception)
 {
    if ($request->expectsJson()) {
     return response()->json(['error' => 'Unauthenticated.'],401);
    }
     $guard = array_get($exception->guards(), 0);
      switch ($guard) {
        case 'admin': $login = 'admin.login';
        break;
        case 'apps': $login = 'apps.login';
        break;
        case 'delivery': $login = 'delivery.login.form';
        break;
        default: $login = 'login';
        break;
      }
        return redirect()->guest(route($login));
  }
}
