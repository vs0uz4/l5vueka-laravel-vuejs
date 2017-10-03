<?php

Route::get('/endereco/{userId}', 'ApiController@address')->middleware('api');
