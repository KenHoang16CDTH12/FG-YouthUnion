<?php

/*
|--------------------------------------------------------------------------
| NamHoc API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/namhocs', 'as' => 'namhoc.'], function() {
    Route::post('/',[
      'uses' => 'NamHocController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'NamHocController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'NamHocController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'NamHocController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'NamHocController@delete',
      'as' => 'delete'
    ]);
});

