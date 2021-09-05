<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserControllMiddleware
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


        /*
        da fare in un secondo momento quando passeremo alla pagina ordini e statistiche i dati del ristorante 
        e dovremmo verificare se lo Auth::id() sara uguale al 'user_id' appartenente al ristorante
        */
    }
}