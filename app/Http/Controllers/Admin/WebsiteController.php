<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function store(Request $request){
        $website= new Website();
        $website->title= $request->input("title");
        $website->description= $request->input("description");
        $website->save();
        if($request->file("logo"))
            $website->addMediaFromRequest("logo")->toMediaCollection('logo');
        return back()->with('status', 'تم اضافة موقع بنجاح');
    }
    public function update(Website $website, Request $request){
        $website->title= $request->input("title");
        $website->description= $request->input("description");
        $website->save();
        if($request->file("logo"))
            $website->addMediaFromRequest("logo")->toMediaCollection('logo');
        return back()->with('status', 'تم تعديل الموقع بنجاح');
    }

    public function destroy($id){
        Website::find($id)->delete();
        return back()->with('status', 'تم حذف الموقع بنجاح');
    }
}
