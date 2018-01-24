<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckAdmin
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
        if(User::where('token', $request -> token) -> first() -> admin == 1)

            return $next($request);

        else return response(['status' => 'server error', 'message' => 'you are not admin', 'data' => null]);
    }
}
