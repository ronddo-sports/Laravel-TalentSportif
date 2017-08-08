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
Route::post('/regin', 'Contollers\UserController@step_one')->name('ragister.step.1');


// Pour les images ( Glide images )
Route::get('img/{path}', function($path, League\Glide\Server $server, Illuminate\Http\Request $request) {
    $server->outputImage($path, $request->all());
})->where('path', '.+');
//fin glide


Route::group(['middleware' => 'authentic','prefix'=>'media','roles' => ['client','admin']],function (){
    Route::get('upload', function (){return view('frontend.media.upload');})->name('upload');
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
