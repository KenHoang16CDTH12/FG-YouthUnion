<?php

/*
|--------------------------------------------------------------------------
| LCDoanHoatDong API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/lcdoanhoatdongs', 'as' => 'lcdoanhoatdong.'], function() {
    Route::post('/',[
      'uses' => 'LCDoanHoatDongController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'LCDoanHoatDongController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'LCDoanHoatDongController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'LCDoanHoatDongController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'LCDoanHoatDongController@delete',
      'as' => 'delete'
    ]);
});

