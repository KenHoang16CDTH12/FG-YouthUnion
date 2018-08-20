<?php

/*
|--------------------------------------------------------------------------
| User API Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/users', 'as' => 'user.'], function() {
    Route::post('/',[
      'uses' => 'UserController@store',
      'as' => 'store'
    ]);
    Route::get('/',[
      'uses' => 'UserController@index',
      'as' => 'index'
    ]);
    Route::get('/{id}',[
      'uses' => 'UserController@show',
      'as' => 'show'
    ]);
    Route::put('/{id}',[
      'uses' => 'UserController@update',
      'as' => 'update'
    ]);
    Route::delete('/{id}',[
      'uses' => 'UserController@delete',
      'as' => 'delete'
    ]);
    /*
    |------------------------------------------------------------------------
    | UserDetail API Routes
    |------------------------------------------------------------------------
    */
    Route::group(['prefix' => '/users/{id}/detail', 'as' => 'user.detail'], function() {
      Route::post('/',[
        'uses' => 'UserController@detailStore',
        'as' => 'store'
      ]);
      Route::get('/',[
        'uses' => 'UserController@detailShow',
        'as' => 'show'
      ]);
      Route::put('/',[
        'uses' => 'UserController@detailUpdate',
        'as' => 'update'
      ]);
    });

    Route::get('/{username}/exists',[
      'uses' => 'UserController@usernameExists',
      'as' => 'username.exists'
    ]);
});

