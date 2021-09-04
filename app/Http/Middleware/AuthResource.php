<?php

namespace App\Http\Middleware;

use App\Restaurant;
use App\Plate;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthResource
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
        //ddd($request->route('restaurant')->user_id, Auth::id());
        //7ddd($request->route('restaurant') );
        if ($request->route('restaurant') != null) {
            # code...
            if (($request->route('restaurant')->user_id) !== (Auth::id())) {
                abort(403, "Don't have the permision" );
            }
        }
        return $next($request);
        
    }
}