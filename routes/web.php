<?php

//Route::view('/test', 'test')->name('test');
Route::get('/test',['uses'=>'User\UserController@test','as'=>'test']);
Route::get('/',['uses'=>'User\UserController@index','as'=>'user_index']);
Route::get('/register',function (){
   return view('auth.register');
});


Auth::routes();
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('/out',['uses'=>'User\UserController@out','as'=>'out']);
Route::group(['prefix'=>'user','middleware'=>['web','auth']],function (){
    Route::get('/cabinet',['uses'=>'User\UserController@cabinet','as'=>'user_cabinet']);
    Route::get('/game/{id}',['uses'=>'User\UserController@game_room','as'=>'game_room']);
    Route::get('/create_game/{id}',['uses'=>'User\UserController@create_game','as'=>'create_game']);
    Route::post('/register_games',['uses'=>'User\UserController@register_game','as'=>'register_game']);
    Route::post('/create_game',['uses'=>'User\UserController@create_game_post','as'=>'create_game_post']);
    Route::post('/register_game_in_room',['uses'=>'User\UserController@register_game_in_room','as'=>'register_game_in_room']);
    Route::get('/money_transfer',['uses'=>'User\UserController@money_transfer','as'=>'money_transfer']);
    Route::get('/games',['uses'=>'User\UserController@games','as'=>'user_games']);
    Route::get('/statistic',['uses'=>'User\UserController@statistic','as'=>'user_statistic']);
    Route::get('/statistic/game/{id_game}',['uses'=>'User\UserController@statistic_game','as'=>'user_statistic_games']);
    Route::get('/money',['uses'=>'User\UserController@money','as'=>'user_money']);
    Route::get('/finance',['uses'=>'User\UserController@finance','as'=>'finance']);


});