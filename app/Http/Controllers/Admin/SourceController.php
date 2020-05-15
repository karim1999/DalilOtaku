<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Source;
use App\SourceType;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    //
    public function index(){
        $data= [
            'sources' => Source::all()
        ];
        return view("admin.sources.view", $data);
    }
    public function store(Request $request){
        $source= new Source();
        $source->name= $request->input("name");
        $source->link= $request->input("link");
        $source->type_id= $request->input("type_id");
        $source->save();
        return redirect()->route('admin.sources.index')->with('status', 'تم اضافة المصدر بنجاح');
    }
    public function create(){
        $data= [
            'types' => SourceType::all()
        ];
        return view("admin.sources.form", $data);
    }
    public function edit(Source $source){
        $data= [
            'types' => SourceType::all()
        ];
        return view("admin.sources.form", $source, $data);
    }
    public function update(Source $source, Request $request){
        $source->name= $request->input("name");
        $source->link= $request->input("link");
        $source->type_id= $request->input("type_id");
        $source->save();
        return back()->with('status', 'تم تعديل المصدر بنجاح');
    }
    public function destroy(Source $source){
        $source->delete();
        return back()->with('status', 'تم حذف المصدر بنجاح');
    }
}
