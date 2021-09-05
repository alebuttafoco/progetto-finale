<?php

namespace App\Http\Middleware;

use App\Restaurant;
use Closure;
use Illuminate\Support\Facades\Auth;

class PlateMiddleware
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
        vado a prendere il ristorante che è associato all'utente che è loggato
        */
        $restaurant_auth = Restaurant::where('user_id', Auth::id())->get();
        
        /*
        vado a verificare che nella richiesta ci sia un piatto, se non ce un piatto gli ritorno la richiesta fatta
        */
        if (($request->route('plate')) != null) {

            /*
            vado a prendere 'restaurant_id' che è associato al piatto
            */
            $restaurant_id= $request->route('plate')->restaurant_id;

            /*
            vado a verificare se gli 'id' dei ristoranti corrispondono 

            $restaurant_auth[0]->id ----> lo prendo in posizione [0] perche avendo lasciato la posibilita di aggiungere piu ristoranti 
            mi puo tornare piu ristoranti, ma nel nostro caso abbiamo fatto che comunque ne inserisca solo uno quindi vado a prendere quel primo
            ristorante e vado a prendere l'id di quel ristorante

            se gli 'id' corrispondono allora gli torno la richiesta altrimenti gli do un errore 403

            */

            if (($restaurant_auth[0]->id) !== ($restaurant_id)) {
                abort(403, "Don't have the permission to acces to this resource");
            }
            
        }

        return $next($request);


    }
}