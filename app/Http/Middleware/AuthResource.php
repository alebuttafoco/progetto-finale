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
        

        
        
        
        /*
            vado a verificare se nella richiesta c'è un ristorante quindi se ce vado a fare la verifica dopo
            altrimenti gli ritorno la richiesta
        */
        if ($request->route('restaurant') != null) {
            
            /*
            se nella richiesta c'è un ristorante vado a prendere lo 'user:id' assocciato a quel ristorante,
            vado a prendere anche l'id dell'utente che e loggato e se questi valori sono diversi gli ritorno un errore 
            403 con un messaggio altrimenti se gli 'id' sono uguali gli ritorno la richiesta e quindi puo andare a vedere il ristorante
            */
            if (($request->route('restaurant')->user_id) !== (Auth::id())) {
                abort(403, "Don't have the permision" );
            }
        }
        return $next($request);
        
    }
}