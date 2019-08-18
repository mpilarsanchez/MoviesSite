<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;


class ActoresController extends Controller
{
      public function listado(){
        $actores = Actor::all();
                   // ->leftJoin('movies', 'actors.favorite_movie-id', '=', 'movies.id')
                   // ->get();
        $vac = compact("actores");
        return view("listadoActores", $vac);
      }

      public function show($id){
        $actor = Actor::find($id);
        $vac = compact("actor");
        return view ("detalleActor", $vac);
      }

      public function search(Request $request){
        //return "Buscando un actor";
       $consulta = $request->input('buscador');
       $actores = Actor::where("first_name","like", '%'.$consulta.'%' )->paginate(5);
         $vac = compact("actores");
         if (!empty($actores)){
            $previous= url()->previous();
           return view ("listadoActores", $vac);
         }
       }
         //PAGINACION
         public function paginado(){
         $actores = Actor::paginate(5);
         return view("listadoActores", compact('actores'));
       }

       public function agregar(Request $req){
      //VALIDACION
        $reglas =[
          //del lado izquierdo campos del formulario que quiero validar(tenemos que utilizar el mismo name del input formulario)
          "first_name"=> "string|min:3",
          "last_name"=> "string|min:3",
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


         $actorNuevo = new Actor();
         $ruta = $req->file("imagen")->store("public");
         $nombreArchivo = basename($ruta);


         $actorNuevo->first_name = $req["first_name"];
         $actorNuevo->last_name = $req["last_name"];
         $actorNuevo->rating = $req["rating"];
         $actorNuevo->imagen = $nombreArchivo;


         $actorNuevo->save();

         return redirect("actores");
       }



  public function edit($id){
   $actorEdit = Actor::find($id);
   $vac = compact("actorEdit");
  return view("actor/edit", $vac);
  }


  public function update(Request $req, $id){
    $id = $req["id"];
    $actor = Actor::find($id);
    $actor->first_name = $req["first_name"];
    $actor->last_name = $req["last_name"];
    $actor->rating = $req["rating"];
    $actor->favorite_movie_id = $req["favorite_movie_id"];
    $actor->imagen = $req["imagen"];

    $actor->save();
    return redirect("/actor/{$actor->id}");
  }

  public function borrar(Request $formulario){
    $id = $formulario["id"];//este id es el que se pone en el name del imput

 //primero recuperamos la pelicula de la base de datos

   $actor = Actor::find($id);

   $actor->delete();
   return redirect("actores");
  }




  }
