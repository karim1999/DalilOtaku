<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $data= [
            'categories' => Category::all()
        ];
        return view("admin.categories.view", $data);
    }
    public function store(Request $request){
        $category= new Category();
        $category->name_en= $request->input("name_en");
        $category->name= $request->input("name");
        $category->description= $request->input("description");
        $category->description_en= $request->input("description_en");
        $category->save();
        return redirect()->route('admin.categories.index')->with('status', 'تم اضافة تصنيف بنجاح');
    }
    public function create(){
        $data= [];
        return view("admin.categories.form", $data);
    }
    public function edit(Category $category){
        return view("admin.categories.form", $category);
    }
    public function update(Category $category, Request $request){
        $category->name_en= $request->input("name_en");
        $category->name= $request->input("name");
        $category->description= $request->input("description");
        $category->description_en= $request->input("description_en");
        $category->save();
        return back()->with('status', 'تم تعديل التصنيف بنجاح');
    }
    public function destroy(Category $category){
        $category->delete();
        return back()->with('status', 'تم حذف التصنيف بنجاح');
    }

}
