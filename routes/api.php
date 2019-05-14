<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('Auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([],function (){
    includeRouteFiles(__DIR__.'/api/');
});
Route::get("migrate",function (){
    \Illuminate\Support\Facades\Artisan::call('migrate:refresh', [
        '--force' => true,'--seed'=>true,
    ]);
});


