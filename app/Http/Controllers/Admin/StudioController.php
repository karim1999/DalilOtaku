<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    //
    public function index(){
        $data= [
            'studios' => Studio::all()
        ];
        return view("admin.studios.view", $data);
    }
    public function create(){
        $data= [];
        return view("admin.studios.form", $data);
    }
    public function edit(Studio $studio){
        return view("admin.studios.form", $studio);
    }

    public function store(Request $request){
        $studio= new Studio();
        $studio->name_en= $request->input("name_en");
        $studio->name= $request->input("name");
        $studio->save();
        return redirect()->route('admin.studios.index')->with('status', 'تم اضافة منتج بنجاح');
    }
    public function update(Studio $studio, Request $request){
        $studio->name_en= $request->input("name_en");
        $studio->name= $request->input("name");
        $studio->save();
        return back()->with('status', 'تم تعديل المنتج بنجاح');
    }

    public function destroy(Studio $studio){
        $studio->delete();
        return back()->with('status', 'تم حذف المنتج بنجاح');
    }


}
