<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Middleware Administratif: Définit la condition logique permettant de garantir la confidentialité des vues restreintes à un accès administratif (Voir son usage dans routes\web.php*)
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type == "admin")
        {
            return $next($request);
        }
        // Une erreur de code 401 sera renvoyée
        abort(401, "Unauthorized Access");
        // route('login');
    }
}
