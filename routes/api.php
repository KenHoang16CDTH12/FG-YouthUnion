<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}

Route::group(['prefix' => '/v1', 'namespace' => 'Api', 'as' => 'api.'], function() {
    /*
    |------------------------------------------------------------
    | Authentication
    |------------------------------------------------------------
    */
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
    });

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

//'middleware' => 'auth:api',
Route::group(['middleware' => 'auth:api', 'prefix' => '/v1', 'namespace' => 'Api', 'as' => 'api.'],  function() {
    /*
    |------------------------------------------------------------
    | Role API Routes
    |------------------------------------------------------------
    */
    Route::get('roles/select', 'RoleController@roles');
    /*
    |------------------------------------------------------------
    | User API Routes
    |------------------------------------------------------------
    */
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');
    Route::get('users/detail/{id}', 'UserController@showDetail');
    Route::get('users/lcdoan/{id}', 'UserController@usersOfLCD');
    Route::get('users/to/lop/{id}', 'UserController@toLop');
    Route::get('users/to/khoa/{id}', 'UserController@toKhoa');
    Route::get('users/to/lcdoan/{id}', 'UserController@toLCD');
    /*
    |------------------------------------------------------------
    | HoatDongType API Routes
    |------------------------------------------------------------
    */
    Route::get('hoatdongtypes', 'HoatDongTypeController@index');
    Route::get('hoatdongtypes/{id}', 'HoatDongTypeController@show');
    Route::post('hoatdongtypes', 'HoatDongTypeController@store');
    Route::put('hoatdongtypes/{id}', 'HoatDongTypeController@update');
    Route::delete('hoatdongtypes/{id}', 'HoatDongTypeController@destroy');
    Route::get('all/hoatdongtypes', 'HoatDongTypeController@all');
    /*
    |------------------------------------------------------------
    | HoatDong API Routes
    |------------------------------------------------------------
    */
    Route::get('hoatdongs', 'HoatDongController@index');
    Route::get('hoatdongs/{id}', 'HoatDongController@show');
    Route::post('hoatdongs', 'HoatDongController@store');
    Route::put('hoatdongs/{id}', 'HoatDongController@update');
    Route::delete('hoatdongs/{id}', 'HoatDongController@destroy');
    Route::get('comingup/hoatdongs', 'HoatDongController@indexComingUp');
    Route::get('happening/hoatdongs', 'HoatDongController@indexHappening');
    Route::get('finished/hoatdongs', 'HoatDongController@indexFinished');
    /*
    |------------------------------------------------------------
    | LCDoan API Routes
    |------------------------------------------------------------
    */
    Route::get('lcdoans', 'LCDoanController@index');
    Route::get('lcdoans/{id}', 'LCDoanController@show');
    Route::post('lcdoans', 'LCDoanController@store');
    Route::put('lcdoans/{id}', 'LCDoanController@update');
    Route::delete('lcdoans/{id}', 'LCDoanController@destroy');
    Route::get('all/lcdoans', 'LCDoanController@all');
    /*
    |------------------------------------------------------------
    | Khoa API Routes
    |------------------------------------------------------------
    */
    Route::get('khoas', 'KhoaController@index');
    Route::get('khoas/{id}', 'KhoaController@show');
    Route::post('khoas', 'KhoaController@store');
    Route::put('khoas/{id}', 'KhoaController@update');
    Route::delete('khoas/{id}', 'KhoaController@destroy');
    /*
    |------------------------------------------------------------
    | Lop API Routes
    |------------------------------------------------------------
    */
    Route::get('lops', 'LopController@index');
    Route::get('lops/{id}', 'LopController@show');
    Route::post('lops', 'LopController@store');
    Route::put('lops/{id}', 'LopController@update');
    Route::delete('lops/{id}', 'LopController@destroy');
    /*
    |------------------------------------------------------------
    | UserHoatDong API Routes
    |------------------------------------------------------------
    */
    Route::get('userhoatdongs/{id}', 'UserHoatDongController@collectionJoined');
    Route::post('userhoatdongs', 'UserHoatDongController@attendance');
    /*
    |------------------------------------------------------------
    | LCDoanHoatDong API Routes
    |------------------------------------------------------------
    */
    Route::get('lcdoanhoatdongs', 'LCDoanHoatDongController@index');
    Route::get('lcdoanhoatdongs/{id}', 'LCDoanHoatDongController@show');
    Route::post('lcdoanhoatdongs', 'LCDoanHoatDongController@store');
    Route::put('lcdoanhoatdongs/{id}', 'LCDoanHoatDongController@update');
    Route::delete('lcdoanhoatdongs/{id}', 'LCDoanHoatDongController@destroy');
     /*
    |------------------------------------------------------------
    | Notifications API Routes
    |------------------------------------------------------------
    */
    Route::get('notifications', 'NotificationController@index');
    Route::get('notifications/{id}', 'NotificationController@show');
    Route::post('notifications', 'NotificationController@store');
    Route::delete('notifications/{id}', 'NotificationController@destroy');
    Route::delete('notifications', 'NotificationController@clear');
});
