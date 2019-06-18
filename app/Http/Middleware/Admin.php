<?php

namespace App\Http\Middleware;

use App\Models\AllUser;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::user()){
            if(!(Auth::user()->roles->name == 'Admin')){
                return redirect()->route('home-index')->with('Error','Sorry You are not authorized to view the Admin page');
            }

            if(Auth::user()->roles->name == 'Admin'){
                return $next($request);
            }
        }else{
            return redirect()->route('home-index')->with('Error','Sorry You are not authorized to view the Admin page');
        }


    }
}
