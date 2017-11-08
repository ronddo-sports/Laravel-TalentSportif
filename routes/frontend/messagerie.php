<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 9/5/2017
 * Time: 02:26
 */


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'Frontend\_MessageController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'Frontend\_MessageController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'Frontend\_MessageController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'Frontend\_MessageController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'Frontend\_MessageController@update']);
});

Route::get('inbox', ['as' => 'get.users.messagerie', 'uses' => 'Frontend\_MessageController@getMessenger']);
Route::get('teting/sms', ['as' => 'my.messagerie', 'uses' => 'Frontend\_MessageController@getMessagerie']);

