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

Route::group(['prefix' => '/v1', 'namespace' => 'Api', 'as' => 'api.'], function() {
    /*
    |-------------------------------------------------------------------
    | Authentication
    |-------------------------------------------------------------------
    */
});

//'middleware' => ['auth:api'],
Route::group(['prefix' => '/v1', 'namespace' => 'Api', 'as' => 'api.'],  function() {
    /*
    |--------------------------------------------------------------------
    | User API Routes
    |--------------------------------------------------------------------
    */
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');
    /*
    |--------------------------------------------------------------------
    | NamHoc API Routes
    |--------------------------------------------------------------------
    */
    Route::get('namhocs', 'NamHocController@index');
    Route::get('namhocs/{id}', 'NamHocController@show');
    Route::post('namhocs', 'NamHocController@store');
    Route::put('namhocs/{id}', 'NamHocController@update');
    Route::delete('namhocs/{id}', 'NamHocController@destroy');
    /*
    |--------------------------------------------------------------------
    | HocKy API Routes
    |--------------------------------------------------------------------
    */
    Route::get('hockys', 'HocKyController@index');
    Route::get('hockys/{id}', 'HocKyController@show');
    Route::post('hockys', 'HocKyController@store');
    Route::put('hockys/{id}', 'HocKyController@update');
    Route::delete('hockys/{id}', 'HocKyController@destroy');
    /*
    |--------------------------------------------------------------------
    | HoatDongType API Routes
    |--------------------------------------------------------------------
    */
    Route::get('hoatdong_types', 'HoatDongTypeController@index');
    Route::get('hoatdong_types/{id}', 'HoatDongTypeController@show');
    Route::post('hoatdong_types', 'HoatDongTypeController@store');
    Route::put('hoatdong_types/{id}', 'HoatDongTypeController@update');
    Route::delete('hoatdong_types/{id}', 'HoatDongTypeController@destroy');
    /* 
    |--------------------------------------------------------------------
    | HoatDong API Routes
    |--------------------------------------------------------------------
    */
    Route::get('hoatdongs', 'HoatDongController@index');
    Route::get('hoatdongs/{id}', 'HoatDongController@show');
    Route::post('hoatdongs', 'HoatDongController@store');
    Route::put('hoatdongs/{id}', 'HoatDongController@update');
    Route::delete('hoatdongs/{id}', 'HoatDongController@destroy');
    /*
    |--------------------------------------------------------------------
    | LCDoan API Routes
    |--------------------------------------------------------------------
    */
    Route::get('lcdoans', 'LCDoanController@index');
    Route::get('lcdoans/{id}', 'LCDoanController@show');
    Route::post('lcdoans', 'LCDoanController@store');
    Route::put('lcdoans/{id}', 'LCDoanController@update');
    Route::delete('lcdoans/{id}', 'LCDoanController@destroy');
    /*
    |--------------------------------------------------------------------
    | Khoa API Routes
    |--------------------------------------------------------------------
    */
    Route::get('khoas', 'KhoaController@index');
    Route::get('khoas/{id}', 'KhoaController@show');
    Route::post('khoas', 'KhoaController@store');
    Route::put('khoas/{id}', 'KhoaController@update');
    Route::delete('khoas/{id}', 'KhoaController@destroy');
    /*
    |--------------------------------------------------------------------
    | Lop API Routes
    |--------------------------------------------------------------------
    */
    Route::get('lops', 'LopController@index');
    Route::get('lops/{id}', 'LopController@show');
    Route::post('lops', 'LopController@store');
    Route::put('lops/{id}', 'LopController@update');
    Route::delete('lops/{id}', 'LopController@destroy');
    /*
    |--------------------------------------------------------------------
    | UserHoatDong API Routes
    |--------------------------------------------------------------------
    */
    Route::get('user_hoatdong', 'UserHoatDongController@index');
    Route::get('user_hoatdong/{id}', 'UserHoatDongController@show');
    Route::post('user_hoatdong', 'UserHoatDongController@store'); 
    Route::put('user_hoatdong/{id}', 'UserHoatDongController@update');
    Route::delete('user_hoatdong/{id}', 'UserHoatDongController@destroy');
    /*
    |--------------------------------------------------------------------
    | LCDoanHoatDong API Routes
    |--------------------------------------------------------------------
    */
    Route::get('lcdoanhoatdongs', 'LCDoanHoatDongController@index');
    Route::get('lcdoanhoatdongs/{id}', 'LCDoanHoatDongController@show');
    Route::post('lcdoanhoatdongs', 'LCDoanHoatDongController@store');
    Route::put('lcdoanhoatdongs/{id}', 'LCDoanHoatDongController@update');
    Route::delete('lcdoanhoatdongs/{id}', 'LCDoanHoatDongController@destroy');
});
