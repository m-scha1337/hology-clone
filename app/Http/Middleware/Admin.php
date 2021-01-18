<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var Users $user */
        $user = auth()->user();

        if (!$user->is_admin) {

            throw new AuthorizationException;
        }

        return $next($request);
    }
}
