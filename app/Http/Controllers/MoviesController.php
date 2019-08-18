<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Movie;


class MoviesController extends Controller
{
   public function listado(){
      $peliculas = Movie::all();//SELECT * FROM movies
      //  dd($peliculas);
          $vac = compact("peliculas");
          return view ("listadoPeliculas", $vac);
        }

  public function listaPeliculas(){
     $peliculas = Movie::all();//SELECT * FROM movies
     //  dd($peliculas);
         $vac = compact("peliculas");
         return view ("agregarActor", $vac);
       }

   public function api(){
      $peliculas = Movie::all();//SELECT * FROM movies
      //  dd($peliculas);
      foreach ($peliculas as $pelicula){
         $pelicula->genre_id = $pelicula->genero['name'];
      }
          return json_encode($peliculas);
    }

      public function detalle($id){
        $pelicula = Movie::find($id); //find y all son los unicos metodos de eloquent que funcionan por si solos
        //SELECT FROM * FROM movies  WHERE id =$id
         $vac = compact ("pelicula");
         return view("detallePelicula", $vac);
       }


 public function agregar(Request $req){
//VALIDACION
  $reglas =[
    //del lado izquierdo campos del formulario que quiero validar(tenemos que utilizar el mismo name del input formulario)
    "title"=> "string|min:3|unique:movies,title",
    "awards"=> "integer|min:0",
    "release_date"=> "date",
    "rating"=>"numeric|min:0|max:10",
    "poster"=>"file"
  ];

  $mensajes=[
  "string"=>"El campo :attribute tiene que ser un texto",
  "min"=>"El campo :attribute tiene un minimo de :min",
  "max"=>"El campo :attribute tiene un maximo de :max",
  "numeric"=>"El campo :attribute debe ser un numero",
  "date"=> "El campo :attribute debe ser una fecha",
  "integer"=>"El campo :attribute debe ser un numero entero",
  "unique"=>"El campo :attribute se encuentra repetido"
  ];

   $this->validate($req, $reglas, $mensajes);


   $peliculaNueva = new Movie();
   $ruta = $req->file("poster")->store("public");
   $nombreArchivo = basename($ruta);

   $peliculaNueva->poster = $nombreArchivo;
   $peliculaNueva->title = $req["title"];
   $peliculaNueva->rating = $req["rating"];
   $peliculaNueva->awards = $req["awards"];
   $peliculaNueva->release_date = $req["release_date"];
   $peliculaNueva->length = $req["length"];

   $peliculaNueva->save();

   return redirect("peliculas");
 }

 public function borrar(Request $formulario){
   $id = $formulario["id"];//este id es el que se pone en el name del imput


//primero recuperamos la pelicula de la base de datos

  $pelicula = Movie::find($id);

  $pelicula->delete();
  return redirect("peliculas");
 }

}
