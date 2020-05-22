<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $guarded= ['id'];
    //
    public function genres(){
        return $this->belongsToMany('App\Genre', 'anime_genres');
    }
    public function studios(){
        return $this->belongsToMany('App\Studio', 'anime_studios');
    }
    public function season(){
        return $this->belongsTo('App\Season');
    }
    public function favorites(){
        return $this->belongsToMany('App\User', 'favorites');
    }
    public function bookmarks(){
        return $this->belongsToMany('App\User', 'bookmarks');
    }
}
