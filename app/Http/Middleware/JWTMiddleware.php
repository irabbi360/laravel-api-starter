<?php

namespace App\Http\Middleware;

use App\Traits\ApiReturnFormatTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    use ApiReturnFormatTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return $this->responseWithNotFound('user not found', 404);
            }
        } catch (JWTException $e) {
            return $this->responseWithError('Unauthorized action detected', '', 403);
        }
        return $next($request);
    }
}
