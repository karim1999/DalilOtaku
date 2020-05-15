<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index(){
        $data= [
            'questions' => Question::all()
        ];
        return view("admin.questions.view", $data);
    }
    public function create(){
        $data= [];
        return view("admin.questions.form", $data);
    }
    public function edit(Question $question){
        return view("admin.questions.form", $question);
    }

    public function store(Request $request){
        $question= new Question();
        $question->question= $request->input("question");
        $question->answer= $request->input("answer");
        $question->save();
        return redirect()->route('admin.questions.index')->with('status', 'تم اضافة سؤال بنجاح');
    }
    public function update(Question $question, Request $request){
        $question->question= $request->input("question");
        $question->answer= $request->input("answer");
        $question->save();
        return back()->with('status', 'تم تعديل السؤال بنجاح');
    }

    public function destroy(Question $question){
        $question->delete();
        return back()->with('status', 'تم حذف السؤال بنجاح');
    }

}
