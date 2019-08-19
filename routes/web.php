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
    return view('welcome');
});


Route::get("/actores", "ActoresController@listado");//vista: listadoActores.blade.php
Route::get("/actor/{id}", "ActoresController@show");//vista: detalleActor.blade.php
Route::post("/actores/buscar", "ActoresController@search");
Route::get("/actores/actor/{id}", "ActoresController@show");
Route::get("/actores", "ActoresController@paginado");



Route::get("/peliculas", "MoviesController@listado");
Route::get("/pelicula/{id}", "MoviesController@detalle");


Route::get("/generos", "GenresController@listado");

//AUTH - PRACTICO 15-08-19

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

  Route::get('/perfil', "UsuariosController@traerUsuario");
  Route::get("/agregarPelicula", "GenresController@listaGenres");
  Route::post("/agregarPelicula", "MoviesController@agregar");
  Route::post("/borrarPelicula", "MoviesController@borrar");
  Route::put("/actor/{id}", "ActoresController@update");
  Route::delete("/borrarActor", "ActoresController@borrar");
  Route::get("/actor/{id}/edit", "ActoresController@edit");
  Route::get("/agregarActor", "MoviesController@listaPeliculas");
  Route::post("/agregarActor", "ActoresController@agregar");
});


//APIS - CURL - URL verClima
Route::get('/clima', "ClimaController@verClima");
