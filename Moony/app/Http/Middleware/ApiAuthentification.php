<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuthentification
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        $user = \App\Models\User::where('api_token', $token)->first();

        if ($user) {
            auth()->login($user);
            return $next($request);
        }
        return response([
            'message' => 'Unauthenticated'
        ], 403);
    }
}
