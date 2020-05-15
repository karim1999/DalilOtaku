<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    //

    public function type(){
        return $this->belongsTo('App\SourceType', 'type_id');
    }
}
