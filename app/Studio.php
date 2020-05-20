<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    //
    protected $fillable= ["id", "name", "name_en"];
    public function animes(){
        return $this->belongsToMany('App\Anime', 'anime_studios');
    }
}
