<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 9/10/2018
 * Time: 11:50
 */
Route::group([
    'prefix' => 'auth',
    'namespace'=> 'Api\Auth'
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('unique', 'AuthController@verifyUnique');
    Route::post('register', 'AuthController@Register');
    Route::get('all/status', 'AuthController@getStatus');
    Route::get('me', 'AuthController@me');
    Route::post('me', 'AuthController@me');
    Route::get('dj', 'RegisterApiController@getStatuses');
    Route::get('test', function (\Illuminate\Http\Request $request) {
        return response()->json(['token'=> $request->token]);
    });

});
