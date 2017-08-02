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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Pour les images ( Glide images )

/*Route::get('img/{path}', function($path, League\Glide\Server $server, Illuminate\Http\Request $request) {
    $server->outputImage($path, $request->all());
})->where('path', '.+');*/

//fin glide

Route::resource('admin/user', 'UserController');

Route::resource('admin/palmares', 'PalmaresController');
Route::resource('admin/media', 'MediaController');
Route::resource('admin/message', 'MessageController');
Route::resource('admin/parcour', 'ParcourController');
Route::resource('admin/photo', 'PhotoController');
Route::resource('admin/photo-profile', 'PhotoProfileController');
Route::resource('admin/user-federation', 'UserFederationController');
Route::resource('admin/user-group', 'UserGroupController');
Route::resource('admin/user-institution', 'UserInstitutionController');
Route::resource('admin/user-organisation', 'UserOrganisationController');
Route::resource('admin/user-sportif', 'UserSportifController');
Route::resource('admin/user-status', 'UserStatusController');
Route::resource('admin/video', 'VideoController');
Route::resource('admin/vue', 'VueController');
Route::resource('admin/carton', 'CartonController');
Route::resource('admin/fan', 'FanController');