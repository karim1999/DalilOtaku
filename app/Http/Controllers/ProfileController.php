<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function favorites(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "animes" => auth()->user()->favorites()->paginate(20),
        ];
        return view("profile", $data);
    }
    public function watching(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "animes" => auth()->user()->watching()->wherePivot("status", "watching")->paginate(20),
        ];
        return view("profile", $data);
    }
    public function watched(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "animes" => auth()->user()->watching()->wherePivot("status", "watched")->paginate(20),
        ];
        return view("profile", $data);
    }
    public function later(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "animes" => auth()->user()->watching()->wherePivot("status", "later")->paginate(20),
        ];
        return view("profile", $data);
    }
    public function bookmarked(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
            "animes" => auth()->user()->bookmarks()->paginate(20),
        ];
        return view("profile", $data);
    }
    public function settings(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
        ];
        return view("profile", $data);
    }

    public function edit(Request $request){
        $user= auth()->user();
        if($request->input("password")){
            $validatedData = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password= Hash::make($request->input('password'));
            $user->save();
        }
        if($request->file("avatar"))
            $user->addMediaFromRequest("avatar")->toMediaCollection('avatar');

        return back()->with("status", "تم تغيير الاعدادات بنجاح");
    }
}
