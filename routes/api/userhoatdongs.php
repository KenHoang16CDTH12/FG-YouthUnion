<?php

/*
|--------------------------------------------------------------------------
| UserHoatDong API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/userhoatdongs', 'as' => 'userhoatdong.'], function() {
    Route::post('/',[
      'uses' => 'UserHoatDongController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'UserHoatDongController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'UserHoatDongController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'UserHoatDongController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'UserHoatDongController@delete',
      'as' => 'delete'
    ]);
});

