<?php

/*
|--------------------------------------------------------------------------
| Lop API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/lops', 'as' => 'lop.'], function() {
    Route::post('/',[
      'uses' => 'LopController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'LopController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'LopController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'LopController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'LopController@delete',
      'as' => 'delete'
    ]);
});

