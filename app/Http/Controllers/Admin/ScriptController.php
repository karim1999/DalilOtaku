<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function store(Request $request){
        $script= new Script();
        $script->script= $request->input("script");
        $script->save();
        return back()->with('status', 'تم اضافة سكربت بنجاح');
    }
    public function update(Script $script, Request $request){
        $script->script= $request->input("script");
        $script->save();
        return back()->with('status', 'تم تعديل السكربت بنجاح');
    }

    public function destroy($id){
        Script::find($id)->delete();
        return back()->with('status', 'تم حذف السكربت بنجاح');
    }
}
