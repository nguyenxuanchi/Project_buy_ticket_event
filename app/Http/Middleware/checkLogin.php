<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class checkLogin
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
        if ($request->session()->has('user_id')) {
            $id = $request->session()->get('user_id');
            $hoten = $request->session()->get('user_hoten');
            view()->share(['id' => $id, 'hoten' => $hoten]);

            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
