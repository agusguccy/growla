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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/profile', function () {
    return view('profile');
});

//RUTAS DE BEERS

Route::get('/beers-list', 'BeerController@listado')->name('beers.list');
Route::get('/detalle/{id}', 'BeerController@detalle')->name('details');
Route::get('/new-beer', 'BeerController@createBeer');
Route::post('/new-beer', 'BeerController@uploadBeer');
Route::post('/deleteBeer', 'BeerController@delete');
Route::get('/beer-edit/{beer}/edit', 'BeerController@edit');
Route::patch('/beer-edit/{beer}', 'BeerController@updateBeer');



//RUTAS DEL REGISTRO/LOGIN/lOGOUT

Route::get('/Registro', 'RegisterController@Validator');
Route::post('/Registro', 'RegisterController@Create');
<<<<<<< HEAD

// Route::post('/home', 'ActionController@logout');
=======
Route::post('/home', 'ActionController@logout');
>>>>>>> e8bcee2cbe07629eb01e1989236fd0d4cfcc54a9

//RUTA DEL BUSCADOR

Route::get('/search', 'SearchController@search')->name('search');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
