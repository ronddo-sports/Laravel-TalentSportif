<?php

Route::group(['middleware' => 'authentic','prefix'=>'media','roles' => ['client','admin']],function (){

    Route::get('upload/image', 'Frontend\_PhotoController@upload')->name('upload.image');
    Route::post('upload/image', 'Frontend\_PhotoController@store' )->name('media.image.post');
    Route::get('upload/video', 'Frontend\_VideoController@upload')->name('upload.video');
    Route::post('upload/video', 'Frontend\_VideoController@store' )->name('media.video.post');
    Route::get('view/edsc', function (){return view('frontend.media.upload');})->name('media.delete');
    Route::get('view/{name}', function (){return view('frontend.media.upload');})->name('visione');



    Route::get('profile/video/{id}', 'Frontend\_VideoController@getUsersVideos' )->name('profile.video.get');
    Route::get('profile/image', 'Frontend\_PhotoController@getUsersImage')->name('profile.image.get');
});

Route::get('album/{u_cononic}/{a_name}/{a_id}', 'Frontend\_AlbumController@index')->name('album.get');
