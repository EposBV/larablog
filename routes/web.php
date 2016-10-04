<?php


Auth::routes();



Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index');

Route::post('/','HomeController@indexChangeCheckbox');
Route::get('/deleteTask/{task}','HomeController@deletetask');

Route::get('/newTask','HomeController@newtask');
Route::post('/newTask','HomeController@insertNewTask');

Route::get('/editTask/{task}','HomeController@gototask');
Route::post('/editTask/{task}','HomeController@insertNewTask');

