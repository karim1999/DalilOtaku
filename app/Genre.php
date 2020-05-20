<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable= ["id", "name", "name_en", "description", "description_en"];
    public function animes(){
        return $this->belongsToMany('App\Anime', 'anime_genres');
    }
}
