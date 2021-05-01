<?php

/*
|------------------------------------------------------------------------------------
| Api
|------------------------------------------------------------------------------------
*/
Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
Route::middleware('auth:api')->group(function () {
    Route::resource('products', 'API\ProductController');
    Route::resource('users', 'API\UserController');
    Route::resource('opinions', 'API\OpinionsController');
    Route::resource('plagues', 'API\PlaguesController');
    Route::resource('likes', 'API\LikesController');
    Route::resource('plaguesopinion', 'API\PlaguesOpinions');
});