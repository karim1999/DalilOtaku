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
//            'terms_title' => Setting::getOption('terms_title'),
//            'terms_content' => Setting::getOption('terms_content')
        ];
        return view("admin.settings", $data);
    }
    public function action(Request $request){
        $data= [
//            'terms_title' => $request->input('terms_title'),
//            'terms_content' => $request->input('terms_content')
        ];
        Setting::setOptions($data);
        return back()->with('status', 'تم تعديل شروط الاستخدام بنجاح');;
    }
}
