<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    //
    public function index(){
        $data= [
            'welcome' => Setting::getOption('welcome'),
            'welcome_title' => Setting::getOption('welcome_title'),
            'welcome_link' => Setting::getOption('welcome_link'),
            'welcome_content' => Setting::getOption('welcome_content')
        ];
        return view("admin.alerts", $data);
    }
    public function action(Request $request){
        $data= [
            'welcome' => $request->input('welcome') ? 1 : 0,
            'welcome_title' => $request->input('welcome_title'),
            'welcome_link' => $request->input('welcome_link'),
            'welcome_content' => $request->input('welcome_content')
        ];
        Setting::setOptions($data);
        return back()->with('status', 'تم تعديل الرسالة الترحيبية بنجاح');;
    }
}
