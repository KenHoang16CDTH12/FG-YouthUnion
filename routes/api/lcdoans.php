<?php

/*
|--------------------------------------------------------------------------
| LCDoan API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/lcdoans', 'as' => 'lcdoan.'], function() {
    Route::post('/',[
      'uses' => 'LCDoanController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'LCDoanController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'LCDoanController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'LCDoanController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'LCDoanController@delete',
      'as' => 'delete'
    ]);
});

