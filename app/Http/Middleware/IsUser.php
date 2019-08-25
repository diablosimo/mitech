<?php

namespace App\Http\Middleware;

use App\Adherent;
use App\Partenaire;
use Closure;

class IsUser
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
        if(auth()->user()!=null)
            if(Adherent::where('user_id', auth()->user()->id)->first()!=null or Partenaire::where('user_id', auth()->user()->id)->first()!=null) {
                return $next($request);
            }
        return redirect('/');
    }
}
