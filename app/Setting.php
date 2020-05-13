<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public static function setOption($key, $value){
        self::updateOrCreate([
            'key' => $key
        ], [
            'value' => $value
        ]);
    }
    public function getOption($key, $first= true){
        $result= self::where('key', $key)->first();
        return $first ? $result : $result->value;
    }
}
