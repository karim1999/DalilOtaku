<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeGenre extends Model
{
    //
    public function anime(){
        return $this->belongsTo('App\Anime');
    }
    public function genre(){
        return $this->belongsTo('App\Genre');
    }
}
