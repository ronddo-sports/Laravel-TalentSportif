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
        if ($request->getMethod() == "OPTIONS") {
            return response(['ok'], 200)->withHeaders([
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE,Tidjani',
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Allow-Headers' => 'Authorization, Content-Type',
            ]);
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
            ->header('Access-Control-Allow-Credentials', true)
            ->header('Access-Control-Allow-Headers', 'Authorization,Content-Type');
    }
}












