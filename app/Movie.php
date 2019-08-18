<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  public $db = 'movies_db';
  //public $primaryKey = "id"; // si en la tabla la columna se llama id no hace falta ponerlo
  //public $timestamps = false; //la base de datos tiene created_at y updated_at no hace falta escribirlo sino si o si hay
  //que poner que es igual a false
  public $guarded = [];

  //DESPUES SEGUIRIAN LOS ATRIBUTOS EJ: private $title
                                      //private $rating
//PERO LARAVEL AUTOMATICAMENTE AL HABER ESCRITO EL NOMBRE DE LA TABLA ANALIZA CADA UNA DE LAS COLUMNAS Y CREA LOS ATRIBUTOS
//LOS GETERS Y LOS SETTERS AUTOMATICAMENTE!!!!!!!!!!!!!!!!!!

public function genero(){
  return $this->belongsTo("App\Genre", "genre_id");//lleva 2 parametros 1) que tipo de objeto debe devolver el metodo y
                                                                       //la clave foranea (genre_id)
}


public function actores() {
    return $this->belongsToMany("App\Actor","actor_movie", "movie_id", "actor_id");
 }
}
