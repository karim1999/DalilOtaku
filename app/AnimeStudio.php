<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeStudio extends Model
{
    //
    public function anime(){
        return $this->belongsTo('App\Anime');
    }
    public function studio(){
        return $this->belongsTo('App\Studio');
    }

}
