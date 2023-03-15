<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->type !== 'admin') {
            if(Auth::user()->type == 'employee'){
                return redirect('/home-employee');
            }
            else{
                return redirect('/home-Firmenchef');
            }
        }

        return $next($request);
    }
}
