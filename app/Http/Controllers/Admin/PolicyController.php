<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
    public function index(){
        $data= [
            'policy_title' => Setting::getOption('policy_title'),
            'policy_content' => Setting::getOption('policy_content')
        ];
        return view("admin.policy", $data);
    }
    public function action(Request $request){
        $data= [
            'policy_title' => $request->input('policy_title'),
            'policy_content' => $request->input('policy_content')
        ];
        Setting::setOptions($data);
        return back()->with('status', 'تم تعديل سياسة الخصوصية بنجاح');;
    }
}
