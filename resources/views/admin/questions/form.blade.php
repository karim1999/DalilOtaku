@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{isset($id) ? route("admin.questions.update", $id) : route("admin.questions.store")}}">
        @if(isset($id))
            @method('PUT')
        @else
            @method('POST')
        @endif
        @csrf
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="input-container">
            <label for="question">السؤال:</label>
            <input placeholder="اكتب عنوان السؤال..." type="text" name="question" required value="{{isset($question) ? $question : ""}}" autofocus>
        </div>
        <div class="input-container">
            <label for="answer">الاجابة:</label>
            <textarea placeholder="اكتب الاجابة..." type="text" name="answer" required>{{isset($answer) ? $answer : ""}}</textarea>
        </div>
        <button type="submit">حفظ</button>
    </form>
@endsection
