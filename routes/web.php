<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home ruta vraća blade view
 Route::get('/', function () {
    return view('welcome');
    });
 
 
Route::middleware(['first', 'second'])->group(function() {
//primjer closure funk
Route::get('foo', function () {
    return 'Hello';
    })->name('profoo');
//redirekcija vraća 404 not found
Route::redirect('/here', '/there');
 });
//ruta vraća view sa parametrom
Route::view('/studispis', 'studispis', ['name' => 'Marko']);

//ruta sa adresnim get parametrom
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

//ruta sa više adresnim get parametrom
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Ovo je neki text<br>'.$postId.'<hr>komentar:<br>'.$commentId;
});

//Ovo je dinamička ruta
Route::get('/users/{id}/{name}',function($id, $name){
  return 'This is user '.$name.' with an id of '.$id;
});


Route::get('/', 'PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services'); 
