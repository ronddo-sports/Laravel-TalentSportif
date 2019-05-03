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

Route::get('/jinkoloi', function () {
    $a = 'a'.file_exists(__FILE__);
    $a1 = 'wiki';
    $a2 = 'kiwi';
    echo ${$a};
})->name('dashboard');

Route::group(['middleware' => 'authentic', 'roles' => ['admin']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'MainController@welcome');
});
Route::group(['middleware' => 'authentic', 'roles' => ['admin']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'MainController@welcome');
});
\Illuminate\Support\Facades\Auth::routes();

// Pour les images ( Glide images )
Route::get('/img/{path}', function(\League\Glide\Server $server, $path) {
    $server->outputImage($path,$_GET);
    exit;
})->where('path', '.+');
//fin glide



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



