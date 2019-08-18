<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
  public $db = "movies_db"; //al ser el nombre de la tabla igual al nombre modelo pero en plural no es necesario aclararlo
  //public $primaryKey = ; la columa primaryKey se llama id por ende no hace falta aclararlo
  //public $timestamps = ;
  public $guarded = [];

  public function getNombreCompleto(){
    return $this->first_name . " " . $this->last_name;
  }
  public function getId(){
    return $this->id;
  }

  public function favorite_movie(){
    return $this->belongsTo("App\Movie", "favorite_movie_id");;
  }

  public function peliculas() {  //nombre que denota que es lo que va a devolver!!!
return $this->belongsToMany("App\Movie","actor_movie", "actor_id","movie_id");
}


}
