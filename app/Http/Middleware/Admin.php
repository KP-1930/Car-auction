<?php

namespace App\Http\Middleware;
use App\User;
use App\Role;
use Auth;
use Closure;


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
        // echo "<pre>";
        // print_r(Auth::user()->role_id);
        // exit;
        
        if(Auth::user()->role_id == 2) {
            return $next($request);
        }else {
            return redirect()->route('home')->with('success','You are Not allowed to Admin Dashboard');
        }
        
       
    }  
}
