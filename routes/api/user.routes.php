<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 9/10/2018
 * Time: 11:50
 */
Route::group([
    'prefix' => 'users',
    'namespace'=> 'Api'
], function () {

    Route::post('one/{token}', 'UserApiController@getByToken');
    Route::get('/top/user/{token?}', 'UserApiController@getTopUsers');
    Route::get('/top/category', 'UserApiController@getTopCategories');
    Route::post('/search', 'UserApiController@searchUsers');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('me', 'AuthController@me');
    Route::get('all/status', 'RegisterApiController@getStatuses');
    Route::get('test', function (\Illuminate\Http\Request $request) {
        return response()->json(['token'=> $request->token]);
    });

    Route::get('subscribe/{owner_token}/{subscriber_token}/{value}', 'UserApiController@subscribe');


});



















