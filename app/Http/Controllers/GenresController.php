<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Genre;

class GenresController extends Controller
{

  public function listado(){
     $generos = Genre::all();
         $vac = compact("generos");
         return view ("listadoGeneros", $vac);
       }

   public function listaGenres(){
      $generos = Genre::all();
      $vac = compact("generos");
      return view ("agregarPelicula", $vac);
        }
}
