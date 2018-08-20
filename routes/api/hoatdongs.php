<?php

/*
|--------------------------------------------------------------------------
| HoatDong API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/hoatdongs', 'as' => 'hoatdong.'], function() {
    Route::post('/',[
      'uses' => 'HoatDongController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'HoatDongController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'HoatDongController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'HoatDongController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'HoatDongController@delete',
      'as' => 'delete'
    ]);
});

