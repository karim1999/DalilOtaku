<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Script;
use App\Setting;
use App\Website;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index(){
        $data= [
            'keywords' => Setting::getOption('keywords'),
            'title' => Setting::getOption('title'),
            'subtitle' => Setting::getOption('subtitle'),
            'logo' => Setting::getOption('logo'),
            'icon' => Setting::getOption('icon'),
            'description' => Setting::getOption('description'),
            'google_id' => Setting::getOption('google_id'),
            'facebook' => Setting::getOption('facebook'),
            'twitter' => Setting::getOption('twitter'),
            'instagram' => Setting::getOption('instagram'),
            'scripts' => Script::all(),
            'websites' => Website::all()
        ];
        return view("admin.settings", $data);
    }
    public function action(Request $request){
        $data= [
            'keywords' => $request->input('keywords'),
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'description' => $request->input('description'),
            'google_id' => $request->input('google_id'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
        ];
        if($request->file("icon"))
            Setting::getOption('icon', false)->addMediaFromRequest("icon")->toMediaCollection('icon');

        if($request->file("logo"))
            Setting::getOption('logo', false)->addMediaFromRequest("logo")->toMediaCollection('logo');

        Setting::setOptions($data);
        return back()->with('status', 'تم تعديل الاعدادات بنجاح');
    }




}
