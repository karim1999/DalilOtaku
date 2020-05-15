<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourceType extends Model
{
    protected $fillable = [
        'name', 'name_en',
    ];
    //
    public function sources (){
        return $this->hasMany('App\Source', 'type_id');
    }
}
