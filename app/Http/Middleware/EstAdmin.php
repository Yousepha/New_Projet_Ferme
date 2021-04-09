<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EstAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->est_admin == 1){
            return $next($request);
        }

        return redirect('home')->with('error',"Vous n'avez pas d'accès administrateur.");
        //return redirect()->route('home')->with($error,"Vous n'avez pas d'accès administrateur.");
    }
}
