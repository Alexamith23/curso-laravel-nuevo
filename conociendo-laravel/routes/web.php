<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/posts/{post}', function ($post) {
//     // $name = request('name');
//     // return view('test',['name'=>$name]);

//     $posts = ['primero'=>"Hola mundo perrito",
//     'segundo'=>'Hola mundo perrito segundo'];

//     if (! array_key_exists($post, $posts)) {
//         # code...
//         abort(404,'Lo siento no se pudo encontrar');
//     }

//     return view('post',['post'=> $posts[$post]]);
    
// });

// Route::get('/posts/{post}', 'PostsController@show');

Route::get('/', function(){
    return view('welcome');
});

Route::get('/about', function(){
    $article = App\Article::all();
    return $article;
    return view('about');
});

// Route::get('/articles', 'ArticlesController@index')->name('articles.index');
// Route::post('/articles','ArticlesController@store');
// Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');   
// Route::get('/articles/create', 'ArticlesController@create'); 
// Route::get('/articles/{article}/edit', 'ArticlesController@edit'); 
// Route::put('/articles/{article}', 'ArticlesController@update'); 
Route::post('/contact','ArticlesController@store');