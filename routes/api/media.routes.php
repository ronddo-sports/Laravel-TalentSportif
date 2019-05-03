<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 10/20/2018
 * Time: 1:24 PM
 */

Route::group([
    'prefix' => 'media',
    'namespace'=> 'Api',
], function () {

    Route::post('send_temps', 'MediaController@registerTempImg');
    Route::get('home/videos','MediaController@index');
    Route::get('/postanduser/{media_id}/{viewer_id?}','MediaController@getPostAndUser');
    Route::get('/get/albums/{token}','MediaController@getUserAlbums');
    Route::post('/create/post','MediaController@createPost');
});