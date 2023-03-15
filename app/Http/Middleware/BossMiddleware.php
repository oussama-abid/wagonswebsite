<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BossMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->type != 'boss') {
            
            if(Auth::user()->type == 'employee'){
                return redirect('/home-employee');
            }
            else{
                return redirect('/');
            }
        }

        return $next($request);
    }
}