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
    Route::apiResource('hoatdongs', 'HoatDongController');
    /*
    |--------------------------------------------------------------------
    | LCDoan API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('lcdoans', 'LCDoanController');
    /*
    |--------------------------------------------------------------------
    | Khoa API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('khoas', 'KhoaController');
    /*
    |--------------------------------------------------------------------
    | Lop API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('lops', 'LopController');
    /*
    |--------------------------------------------------------------------
    | UserHoatDong API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('userhoatdongs', 'UserHoatDongController');
    /*
    |--------------------------------------------------------------------
    | LCDoanHoatDong API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('lcdoanhoatdongs', 'LCDoanHoatDongController');
});
