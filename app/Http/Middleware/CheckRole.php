<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if($request->user()->id == 1)
        {
            return $next($request);
        }
        return redirect('/');
        // $action = $request->route()->getAction();
        // $roles  = isset($action['roles']) ? $action['roles'] : null;

        // if($request->user()->hasAnyRole($roles))
        // {
        //     return $next($request);
        // }
    }
}