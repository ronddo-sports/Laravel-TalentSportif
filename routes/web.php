<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inscription/step_one',function (){return view('auth.register_1');})->name('etape_une');
Route::post('/regin', 'Admin\UserController@step_one')->name('ragister.step.1');
Route::get('/profile/{key}', 'Frontend\_UserController@show')->name('profile');


// Pour les images ( Glide images )
Route::get('img/{path}', function($path, League\Glide\Server $server, Illuminate\Http\Request $request) {
    $server->outputImage($path, $request->all());
})->where('path', '.+');
//fin glide

Route::get('regarde', function (){return view('frontend.media.LectureVideo');})->name('lectureVid');


Route::group(['middleware' => 'authentic','prefix'=>'media','roles' => ['client','admin']],function (){
    Route::get('upload/image', 'Frontend\_PhotoController@upload')->name('upload.image');
    Route::post('upload/image', 'Frontend\_PhotoController@store' )->name('media.image.post');
    Route::get('upload/video', 'Frontend\_VideoController@upload')->name('upload.video');
    Route::post('upload/video', 'Frontend\_VideoController@store' )->name('media.video.post');
    Route::get('view/edsc', function (){return view('frontend.media.upload');})->name('media.delete');
    Route::get('view/{name}', function (){return view('frontend.media.upload');})->name('visione');
});
Route::group(['middleware' => 'authentic','prefix'=>'admin','roles' => ['admin']],function (){

    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    Route::get('', function (){return view('admin.dashboard');})->name('dashboard');
    includeRouteFiles(__DIR__.'/admin/');

});
includeRouteFiles(__DIR__.'/frontend/');


Route::get('/home', 'HomeController@index')->name('home');

