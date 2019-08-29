<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Redirect;
class is_Admin
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
        $user=\Auth::user();
        If(!$user->isAdmin()){
        Return redirect()->back()->with(['error','No tenes privilegios de Administrador']);
        }
        return $next($request);
    }
}
