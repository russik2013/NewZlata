<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckUser
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
        if(User::where('token', $request -> token) -> first())

            return $next($request);

        else return response(['status' => 'server error', 'message' => 'you are not my father', 'data' => null]);

    }
}
