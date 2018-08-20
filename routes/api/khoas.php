<?php

/*
|--------------------------------------------------------------------------
| Khoa API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/khoas', 'as' => 'khoa.'], function() {
    Route::post('/',[
      'uses' => 'KhoaController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'KhoaController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'KhoaController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'KhoaController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'KhoaController@delete',
      'as' => 'delete'
    ]);
});

