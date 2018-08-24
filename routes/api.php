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
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */
    Route::post('/login', 'Auth/LoginController@login');
    Route::get('/logout', 'Auth/LoginController@logout');
});

//'middleware' => ['auth:api'],
Route::group(['prefix' => '/v1', 'namespace' => 'Api', 'as' => 'api.'],  function() {
    /*
    |--------------------------------------------------------------------
    | User API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('users', 'UserController');
    /*
    |--------------------------------------------------------------------
    | NamHoc API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('namhocs', 'NamHocController');
    /*
    |--------------------------------------------------------------------
    | HocKy API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('hockys', 'HocKyController');
    /*
    |--------------------------------------------------------------------
    | HoatDongType API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('hoatdongtypes', 'HoatDongTypeController');
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
    Route::apiResource('lops', 'Api/LopController');
    /*
    |--------------------------------------------------------------------
    | UserHoatDong API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('userhoatdongs', 'Api/UserHoatDongController');
    /*
    |--------------------------------------------------------------------
    | LCDoanHoatDong API Routes
    |--------------------------------------------------------------------
    */
    Route::apiResource('lcdoanhoatdongs', 'Api/LCDoanHoatDongController');
});
