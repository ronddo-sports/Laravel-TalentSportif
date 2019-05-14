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
    Route::get('/postanduser/{media_type}/{post_token}/{viewer_token?}','MediaController@getPostAndUser');
    Route::get('/moreposts/{media_type}/{post_token}/{viewer_token?}','MediaController@getMorePosts');
    Route::get('/get/albums/{token}','MediaController@getUserAlbums');
    Route::get('/get/user/gallery/{token}','MediaController@userGallery');
    Route::post('/upload/photo','MediaController@uploadPhoto');
    Route::post('/upload/video','MediaController@uploadVideo');
    Route::post('/test/upload','MediaController@testUpload');
});