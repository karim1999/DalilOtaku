<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['key', 'value'];

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
    public static function getOption($key, $value= true){
        $result= self::where('key', $key)->first();
        return $value ? $result->value : $result;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->useFallbackUrl('/assets/logo.png')
            ->singleFile();
        $this
            ->addMediaCollection('icon')
            ->useFallbackUrl('/assets/logo.png')
            ->singleFile();
    }

}
