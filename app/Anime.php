<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $with= ["genres", "studios", "favorites"];
    protected $guarded= ['id'];
    //

    protected static function booted()
    {
        static::addGlobalScope('airing', function (Builder $builder) {
            $builder->where('is_airing', 1);
        });
    }

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
        return $this->belongsToMany('App\User', 'favorites')->withTimestamps();
    }
    public function bookmarks(){
        return $this->belongsToMany('App\User', 'bookmarks')->withTimestamps();
    }
    public function watching_by(){
        return $this->belongsToMany('App\User', 'watchings')->withPivot("status")->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('banned', 0)->whereNotNull("description")->whereDoesntHave("genres", function($genres){
            $genres->where("banned", 1);
        })->orderBy('type', 'desc');
    }
}
