<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->tipo_usuario == 1){
                return redirect()->route('usuario_index');
            }else if($user->tipo_usuario == 2){
                return redirect()->route('administrador_index');
            }
        }
        return $next($request);
    }
}
