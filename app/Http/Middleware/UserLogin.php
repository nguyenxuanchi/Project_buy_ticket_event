<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
            $id = $request->session()->get('user_id');
            $hoten = $request->session()->get('user_hoten');

            view()->share(['id' => $id, 'hoten'=>$hoten]);

            return $next($request);
    }
}
