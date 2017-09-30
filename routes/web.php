<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'usuarios'], function (){
    Route::get('',                  'UsersController@index')->name('user.index');
    Route::post('criar',            'UsersController@create')->name('users.create');
    Route::post('atualizar/{id}',   'UsersController@update')->name('users.update');
    Route::get('remover/{id}',      'UsersController@remove')->name('users.remove');
});
