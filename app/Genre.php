<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

      public $table = "genres";
      public $guardes = [];

      public function peliculas(){
        return $this->hasMany("App\Movie", "genre_id");
      }
}
