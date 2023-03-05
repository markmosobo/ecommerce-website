<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->role; 
      
          switch ($role) {
            case 'admin':
               return redirect('/admin_dashboard');
               break;
            case 'seller':
               return redirect('/seller_dashboard');
               break; 
            case 'buyer':
                return redirect('/buyer_dashboard');
                break;    
      
            default:
               return redirect('/home'); 
               break;
          }
        }
        return $next($request);
    }
}
