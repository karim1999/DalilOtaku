<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function index(){
        $data= [
            'genres' => Genre::where("banned", 0)->paginate(15)
        ];
        return view("admin.genres.view", $data);
    }
    public function store(Request $request){
        $genre= new Genre();
        $genre->name_en= $request->input("name_en");
        $genre->name= $request->input("name");
        $genre->description= $request->input("description");
        $genre->description_en= $request->input("description_en");
        $genre->save();
        return redirect()->route('admin.genres.index')->with('status', 'تم اضافة تصنيف بنجاح');
    }
    public function create(){
        $data= [];
        return view("admin.genres.form", $data);
    }
    public function edit(Genre $genre){
        return view("admin.genres.form", $genre);
    }
    public function update(Genre $genre, Request $request){
        $genre->name_en= $request->input("name_en");
        $genre->name= $request->input("name");
        $genre->description= $request->input("description");
        $genre->description_en= $request->input("description_en");
        $genre->save();
        return back()->with('status', 'تم تعديل التصنيف بنجاح');
    }
    public function destroy(Genre $genre){
//        $genre->delete();
        $genre->banned= 1;
        $genre->save();
        return back()->with('status', 'تم حظر التصنيف بنجاح');
    }
    public function enable($genre_id){
        $genre= Genre::findOrFail($genre_id);
        $genre->banned= 0;
        $genre->save();
        return back()->with('status', 'تم فك حظر التصنيف بنجاح');
    }

}
