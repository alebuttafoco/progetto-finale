<?php

namespace App\Http\Middleware;

use App\Restaurant;
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
        
        $id = $request->user()->id;
        $restaurants = Restaurant::where('user_id', $id)->get();
        //ddd($restaurants[0]->user_id );
        
        $prova = $restaurants[0]->user_id;
        if ($prova === Auth::id()) {
            return $next($request);
            
        }
        return route('/cart');
        
    }
}