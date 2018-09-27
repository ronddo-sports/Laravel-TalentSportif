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

Route::get('/', 'MainController@welcome');

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Pour les images ( Glide images )
Route::get('/img/{path}', function(\League\Glide\Server $server, $path) {
    $server->outputImage($path,$_GET);
})->where('path', '.+');
//fin glide

Route::get('/profile/{key}', 'Frontend\_UserController@show')->name('profile');
Route::get('regarde', function () {
    return view('frontend.media.LectureVideo');
})->name('lectureVid');
Route::get('about', function () {
    return view('frontend.about.about');
})->name('about');

Route::get('search', 'Frontend\_searchController@index')->name('general.search');


Route::group(['middleware' => 'authentic', 'prefix' => 'admin', 'roles' => ['admin']], function () {

    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    Route::get('', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    includeRouteFiles(__DIR__ . '/admin/');

});


includeRouteFiles(__DIR__ . '/frontend/');



