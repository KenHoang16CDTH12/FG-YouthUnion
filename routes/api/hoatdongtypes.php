<?php

/*
|--------------------------------------------------------------------------
| HoatDongType API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/hoatdongtypes', 'as' => 'hoatdongtype.'], function() {
    Route::post('/',[
      'uses' => 'HoatDongTypeController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'HoatDongTypeController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'HoatDongTypeController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'HoatDongTypeController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'HoatDongTypeController@delete',
      'as' => 'delete'
    ]);
});

