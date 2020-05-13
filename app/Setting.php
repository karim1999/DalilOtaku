<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];
    //
    public static function setOption($key, $value){
        self::updateOrCreate([
            'key' => $key
        ], [
            'value' => $value
        ]);
    }
    public static function setOptions($arr){
        foreach ($arr as $key => $value){
            self::setOption($key, $value);
        }
    }
    public static function getOption($key, $first= true){
        $result= self::where('key', $key)->first();
        return $first ? $result->value : $result;
    }
}
