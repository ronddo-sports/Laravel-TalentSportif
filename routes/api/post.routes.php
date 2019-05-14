<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 10/20/2018
 * Time: 1:24 PM
 */

Route::group([
    'prefix' => 'post',
    'namespace'=> 'Api'
], function () {

    Route::get('like/{user_token}/{post_id}/{carton}','PostController@votePost');
    Route::get('/postanduser/{media_id}/{viewer_id?}','MediaController@getPostAndUser');
    Route::get('/comments/load/{post_token}/','PostController@getComments');
    Route::post('/comment/post','PostController@sendComment');

});