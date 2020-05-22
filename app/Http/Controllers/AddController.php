<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddController extends Controller
{
    //
    public function add_favorites($anime_id){
        auth()->user()->favorites()->toggle([$anime_id]);
        return redirect()->route('profile.favorites')->with('status', 'تم بنجاح');;
    }
    public function add_bookmarks($anime_id){
        auth()->user()->bookmarks()->toggle([$anime_id]);
        return redirect()->route('profile.bookmarked')->with('status', 'تم بنجاح');;
    }
    public function add_watching($anime_id, $status){
        auth()->user()->watching()->toggle([$anime_id=> ['status' => $status]]);
//        auth()->user()->watching()->syncWithoutDetaching([$anime_id=> ['status' => $status]]);
        $value= auth()->user()->watching()->where(["anime_id" => $anime_id])->first();
        if($value){
            $value->status= $status;
            $value->save();
        }else{
            auth()->user()->watching()->toggle([$anime_id=> ['status' => $status]]);
        }
        return redirect()->route('profile.'.$status)->with('status', 'تم بنجاح');;
    }
}
