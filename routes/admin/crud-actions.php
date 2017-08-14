<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 8/2/2017
 * Time: 23:51
 */
Route::resource('user', 'UserController');

Route::resource('palmares', 'PalmaresController');
Route::resource('media', 'MediaController');
Route::resource('message', 'MessageController');
Route::resource('parcour', 'ParcourController');
Route::resource('photo', 'PhotoController');
Route::resource('photo-profile', 'PhotoProfileController');
Route::resource('users', 'UserController');
Route::resource('user-federation', 'UserFederationController');
Route::resource('user-group', 'UserGroupController');
Route::resource('user-institution', 'UserInstitutionController');
Route::resource('user-organisation', 'UserOrganisationController');
Route::resource('user-sportif', 'UserSportifController');
Route::resource('status', 'UserStatusController');
Route::resource('video', 'VideoController');
Route::resource('vue', 'VueController');
Route::resource('carton', 'CartonController');
Route::resource('fan', 'FanController');