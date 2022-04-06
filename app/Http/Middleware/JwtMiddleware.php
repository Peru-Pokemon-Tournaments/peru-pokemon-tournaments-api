<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {

            $user = JWTAuth::parseToken()->authenticate();

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
            {
                return response(
                    [
                        "message" => "Autorización inválida",
                    ],
                    Response::HTTP_UNAUTHORIZED);
            }

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
            {
                return response(
                    [
                        "message" => "Autorización expirada",
                    ],
                    Response::HTTP_UNAUTHORIZED);
            }

            return response(
                [
                    "message" => "Autorización no encontrada",
                ],
                Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
