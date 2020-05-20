<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //
    protected $fillable= ["year", "season"];
    public function animes(){
        return $this->hasMany('App\Anime');
    }
}
