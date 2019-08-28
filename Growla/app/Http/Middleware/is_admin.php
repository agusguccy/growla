<?php

namespace App\Http\Middleware;

use Closure;

class is_admin
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
        User=\Auth::user();
        If($user->is_admin ¡=1){
        Return redirect()->back()->with([‘error’,’No tenes privilegios de Administrador’]);
        }
        return $next($request);
    }
}
