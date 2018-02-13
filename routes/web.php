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
Route::get('activate/{token}', 'Users\UserController@verifyEmail')->name('user.activate');

Route::get('mail-check', 'Users\UserController@mailCheck');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admins\AdminDashboardController@index')->name('admin');
    Route::resource('permissions', 'Admins\PermissionController');
    Route::resource('roles', 'Admins\RoleController');
    Route::resource('user-role', 'Admins\UserRoleController');
    Route::resource('permission-role', 'Admins\PermissionRoleController');
    Route::resource('campaigns', 'Admins\EmailCampaignController');
    Route::resource('templates', 'Admins\EmailTemplateController');
    Route::get('templates/{id}/raw', 'Admins\EmailTemplateController@row')->name('email.raw');
});
