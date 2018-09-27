<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 9/13/2018
 * Time: 17:43
 */

namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            //->header('Access-Control-Allow-Headers: Origin, Content-Type, x-xsrf-token, xsrf-token, Authorization')
            ;
    }
}