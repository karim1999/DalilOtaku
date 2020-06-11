<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class ContactController extends Controller
{
    //
    public function index(){
        $data= [
            "settings"=> Setting::all()->keyBy("key"),
        ];
        return view("contact", $data);
    }
    public function send(Request $request){
        $subject= "رسال من اتصل بنا";
        $name= $request->input("name");
        $email= $request->input("email");
        $content= $request->input("content");
        $to= Role::findByName("super-admin")->users;
        foreach ($to as $user)
            Mail::to($user)->send(new ContactMail($subject, $content, $email, $name));
        return back()->with("status", "تم ارسال الرسالة بنجاح");
    }
}
