<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $age = 30;

        if ($age < 18) {
            return redirect()->route('home')->with('warning', "Non hai accesso a questa pagina perché non hai l'età minima richiesta.");
        }
        return $next($request);
    }
}
