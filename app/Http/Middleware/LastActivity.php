<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;
use Cache;

class LastActivity
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

        if(Auth::check()) {
            $expireAt = Carbon::now()->addMinutes(2);
            Cache::put('user-is-online'.Auth::user()->id, true ,$expireAt);
        }
        return $next($request);
    }
}
