<?php

namespace App\Http\Middleware;

use App\Model\User;
use Illuminate\Http\Request;
use Closure;
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
        if ($request->user() == null){
            return response('Insuffitient Permission',401);
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null ;

        if ($request->user()->hasAnyRole($roles) || !$roles){
            return $next($request);
        }
        return response('Insuffitient Permission',401);
    }
}
