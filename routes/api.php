<?php

Route::get('/', function () {
    return 'Aprecie o Silêncio!';
})->middleware('api');

Route::get('/endereco/{userId}', 'Api\AddressesController@index')->middleware('api');

Route::group(['prefix' => 'usuarios', 'middleware' => 'api'], function (){
    Route::get('',                  'Api\UsersController@index')->name('user.index');
    Route::post('criar',            'Api\UsersController@create')->name('users.create');
    Route::post('atualizar/{id}',   'Api\UsersController@update')->name('users.update');
    Route::get('remover/{id}',      'Api\UsersController@remove')->name('users.remove');
});
