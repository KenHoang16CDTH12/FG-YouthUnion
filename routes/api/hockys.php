<?php

/*
|--------------------------------------------------------------------------
| HocKy API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/hockys', 'as' => 'hocky.'], function() {
    Route::post('/',[
      'uses' => 'HocKyController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'HocKyController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'HocKyController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'HocKyController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'HocKyController@delete',
      'as' => 'delete'
    ]);
});

