<?php

namespace App\Http\Middleware;
use App\User;

use Closure;

class Token
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
        $authorized = User::where('token', '=', $request->get('token'))->get();
        if (sizeof($authorized) != 1) {
            return response(["message" => "Unauthorized user"], 401);
        }
        return $next($request);
    }
}
