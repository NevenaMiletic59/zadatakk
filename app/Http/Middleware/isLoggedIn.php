<?php

namespace App\Http\Middleware;

use Closure;

class isLoggedIn
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
        if($request->session()->has("korisnik"))
            return $next($request); // uloga@getAll
        else
            return redirect("/")->with("message", " Korisnik nije ulogovan!");
        
    }
}
