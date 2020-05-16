<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index(){
        $data= [
            'title' => Setting::getOption('title'),
            'subtitle' => Setting::getOption('subtitle'),
            'logo' => Setting::getOption('logo'),
            'icon' => Setting::getOption('icon'),
            'description' => Setting::getOption('description'),
            'google_id' => Setting::getOption('google_id'),
            'facebook' => Setting::getOption('facebook'),
            'twitter' => Setting::getOption('twitter'),
            'instagram' => Setting::getOption('instagram'),
        ];
        return view("admin.settings", $data);
    }
    public function action(Request $request){
        $data= [
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'logo' => $request->input('logo'),
            'icon' => $request->input('icon'),
            'description' => $request->input('description'),
            'google_id' => $request->input('google_id'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
        ];
        Setting::setOptions($data);
        return back()->with('status', 'تم تعديل الاعدادات بنجاح');
    }

}
