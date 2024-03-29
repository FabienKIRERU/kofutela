<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {        
        // verifier si l'utilisateur connécté est le bailleur,(rôle = admin)
        if (auth()->user()->role == 'admin') {
            // si oui, on va jusqu'à la prochaine requête, 
            return $next($request);            
        }else{
            // sinon on redirige vers la page de connection
            abort(403, "vous ne pouvez pas accéder");
        }
    }
}
