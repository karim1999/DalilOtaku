@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a href="{{route("admin.questions.create")}}"><button class="add-btn">اضافة</button></a>
        @foreach($questions as $question)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.questions.destroy", $question->id)}}">
                @method('DELETE')
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="question">السؤال:</label>
                    @endif
                    <input disabled type="text" name="question" value="{{$question->question}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="answer">الاجابة:</label>
                    @endif
                    <input disabled type="text" name="answer" value="{{$question->answer}}" autofocus>
                </div>
                <a href="{{route("admin.questions.edit", $question->id)}}">
                    <button type="button" class="btn-edit">تعديل</button>
                </a>
                <button type="submit" class="btn-delete">حذف</button>
            </form>
        @endforeach
    </div>
@endsection
