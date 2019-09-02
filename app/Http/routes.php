<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','LoginController@create');
Route::post('/login','LoginController@store');
Route::get('/logout','LoginController@logout');
//Auth::routes();

Route::get('/editor','EditorController@index');
Route::get('/editor/add','EditorController@create');
Route::post('/editor/add','EditorController@store');
Route::get('/editor/show/{id}','EditorController@show');
Route::get('/editor/delete/{id}','EditorController@destroy');
Route::get('/editor/edit/{id}','EditorController@edit');
Route::post('/editor/edit/{id}','EditorController@update');

Route::get('/category','CategoryController@index');
Route::get('/category/show/{id}','CategoryController@show');
Route::get('/category/delete/{id}','CategoryController@destroy');
Route::get('/category/add','CategoryController@create');
Route::post('/category/add','CategoryController@store');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/edit/{id}','CategoryController@update');

Route::get('/news',"NewsController@index");
Route::get('/news/add',"NewsController@create")->middleware('checkEditor');
Route::post('/news/add',"NewsController@store")->middleware('checkEditor');
Route::get('/news/show/{id}',"NewsController@show")->middleware('checkEditor');
Route::get('/news/edit/{id}',"NewsController@edit")->middleware('checkEditor');
Route::post('/news/edit/{id}',"NewsController@update")->middleware('checkEditor');
Route::get('/news/delete/{id}',"NewsController@destroy")->middleware('checkEditor');

//Route::auth();
Route::get('/reader','ReaderController@index')->middleware('checkReader');
Route::get('/reader/show/{id}','ReaderController@show')->middleware('checkReader');
Route::get('/reader/register','ReaderController@create');
Route::post('/reader/register','ReaderController@store');
//Route::get('/reader/login','ReaderController@getLogin');
//Route::post('/reader/login','ReaderController@postLogin');
//Route::get('//reader/logout','ReaderController@logout');

Route::post('/reader/show/{id}','ReaderNewsController@store')->middleware('checkReader');
//Route::auth();

//Route::get('/home', 'HomeController@index');
