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

//Route::get("/movie/{id}", function($id){
//  $vac = compact("id");
//  return view("detallePelicula", $vac);
//});


// Route::get("/movies", function(){
//   $peliculas = [
//     0=> [
//       "nombre"=>"Buscando a Nemo",
//       "rating"=>8.6
//     ],
//     1=> [
//       "nombre"=>"Toy Story",
//       "rating"=>9.3
//     ],
//     2=> [
//       "nombre"=>"Toy Story 2",
//       "rating"=>7.6
//     ],
//
//   ];
//   $vac = compact("peliculas");
//   return view ("listadoPeliculas", $vac);
// });


Route::get("/actores", "ActoresController@listado");//vista: listadoActores.blade.php
Route::get("/actor/{id}", "ActoresController@show");//vista: detalleActor.blade.php
Route::post("/actores/buscar", "ActoresController@search");
Route::get("/actores/actor/{id}", "ActoresController@show");//????
Route::get("/actores", "ActoresController@paginado");

Route::get("/agregarActor", "MoviesController@listaPeliculas")->middleware('auth');

// b. Crear la ruta POST /actors/add (/agregarActor), junto con el método
// ActorController@store(ActoresController@agregar). Este método deberá guardar los datos del nuevo
// actor, y luego redirigir a la ruta /actors. (Se recomienda explorar el método
// create)

Route::post("/agregarActor", "ActoresController@agregar")->middleware('auth');

// c. Crear la ruta ​/actor/{id}/edit​, junto con el método ActorController@edit​
// y la vista ​actor/edit.blade.php​.

//
 // Route::get("/actor/edit", function() {
 //   return view("actor/edit");
 //  });
Route::get("/actor/{id}/edit", "ActoresController@edit")->middleware('auth');

 // d. Crear la ruta PUT ​/actor/{id}​, junto con el método ActorController@udpate​.
 // Este método deberá actualizar los datos del actor modificado, y redireccionar a ​/actor/{id}​.
 // Para que Laravel tome la rota por PUT debemos agregar en el formulario de edición un
 // <input type=”hidden” name=”_method” value=”PUT”>
Route::put("/actor/{id}", "ActoresController@update")->middleware('auth');

Route::delete("/borrarActor", "ActoresController@borrar")->middleware('auth');
//g. Crear la ruta DELETE ​/actor​, junto con el método ActorController@destroy​.
//Este método deberá eliminar el usuario correspondiente. Luego, deberá redirigir a la ruta ​/actors​.

Route::get("/peliculas", "MoviesController@listado");
Route::get("/pelicula/{id}", "MoviesController@detalle");

Route::get("/agregarPelicula", "GenresController@listaGenres")->middleware('auth');

Route::post("/agregarPelicula", "MoviesController@agregar")->middleware('auth');

Route::post("/borrarPelicula", "MoviesController@borrar")->middleware('auth');

Route::get("/generos", "GenresController@listado");

//AUTH - PRACTICO 15-08-19

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', "UsuariosController@traerUsuario")->middleware('auth');


// route post: significa que la ru<ra/peliculas solo va a responder si el pedido vien por post
// Route::post('/movies', function(){
//   return "Listado de Peliculas";
// });

//Route::get('/registracion') por get solo va a mostrar el formulario
// Route::get('/registracion', function(){
//   return "Registrese";
// });
//
//
// //Route::post('/registracion') por post se va a encargar de hacer la insercion en base de datos
//
// Route::post('/registracion', function(){
//   return "Bienvenido";
// });
//
// Route::get('/home{name}', function($name){
//   return "Hello ". $name;
// });
//
// Route::get('ruleta/{numero}', function($numero){
//   return "Apuesta al numero ". $numero;
// });
//
// Route::get("/ruleta/{numero}", function($numero) {
//   if($numero >= 0 && $numero <= 36){
//     return "Apuesta al numero " . $numero;
//   }else{
//     return "Numero invalido";
//   }
// });
//
// Route::get("/ruleta/{numero}/{apuesta}", function($numero, $apuesta) {
//   if($numero >= 0 && $numero <= 36){
//     return "Apuesta $apuesta al numero $numero";
//   }else{
//     return "Numero invalido";
//   }
// });
//
// Route::get("/ruleta/{numero}/{apuesta?}", function($numero, $apuesta = 50) {
//   if($numero >= 0 && $numero <= 36){
//     return "Apuesta $apuesta al numero $numero";
//   }else{
//     return "Numero invalido";
//   }
// });
//
// Route::get("/inicio", function() {
//   return view("inicio");
// });
//
//
//
// //EJERCITACION PRESENCIAL 01/08/19
// ///*2. Creando rutas:
// //a. Crear una ruta a /miPrimeraRuta, y que al ingresar, devuelva “Creé
// //mi primer ruta en Laravel”.
// Route::get('/miPrimeraRuta', function(){
//   return "Cree, mi primera ruta en Laravel";
// });
// //b. Crear una ruta /esPar/{numero}, y que al ingresar, devuelva un string
// //indicando si el número es par o impar.
// Route::get('/esPar{numero}', function($numero){
//   if($numero % 2 == 0){
//     return "EL numero $numero es par";
//   }else{
//     return "El numero $numero es impar";
//   }
// });
// //c. Crear una ruta llamada sumar que reciba dos números como
// //parámetros. La ruta debe retornar la suma de ambos números.
// Route::get('/Sumar{numero1}/{numero2}', function($numero1, $numero2){
//     return $numero1 + $numero2;
//   }
// );
// //d. Modificar la ruta anterior para que pueda recibir un nuevo parámetro
// //opcional. Es decir, si la ruta anterior recibe el nuevo parámetro, debe
// //sumar los tres números, en caso contrario, debe realizar la suma
// //original
// Route::get('/Sumar{numero1}/{numero2}/{numero3?}', function($numero1, $numero2, $numero3 = 5){
//     return $numero1 + $numero2 + $numero3;
//   }
// );

//Ejercitación Blade

//1. Blade:
//a. Crear una ruta /peliculas. Esta ruta debe definir un array que
//contenga los títulos de 5 películas.


//b. Crear la vista peliculas.blade.php, y asociarla a la ruta
///peliculas, enviando el array de películas ya definido. Mostrar en la
//vista, el listado de películas utilizando la sintaxis de PHP clásica.


//c. Modificar la sintaxis de la vista anterior, implementando blade.


//d. Modificar la vista creada para que en el caso de no haber ninguna
//película se lea el mensaje “No hay películas”. Probar dicho caso.


//e. Modificar el array de películas original para que cada película no sea
//solamente un título sino un conjunto de título y rating. Realizar las
//adaptaciones necesarias en la vista para que siga funcionando todo.


//f. Agregarle al listado un mensaje al lado de las películas que tengan
//rating mayor a 8 que diga “Recomendada”.


//g. Crear la ruta /peliculas/{id} que tome del array de películas, la
//posición dada en {id} y muestre el título y rating de dicha película en la
//vista detallePelicula.blade.php.


//h. Modificar la vista detallePelicula.blade.php para que muestre un
//mensaje en caso de que el id no sea válido o no corresponda con
//ninguna película


//i. Modificar todas las vistas creadas en esta guía para que la estructura
//global de HTML pase a formar parte de un layout.


//j. Modificar el layout para que el <title> de cada página varie según la
//página final. Agregarle un <title> a todas las páginas.

//k. Agregar soporte para que cada página pueda agregar hojas de estilo
//según la página. Hacer pruebas de esta funcionalidad.
