@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a href="{{route("admin.roles.create")}}"><button class="add-btn">اضف</button></a>
        @foreach($roles as $role)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.roles.destroy", $role->id)}}">
                @method('DELETE')
                @csrf
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">الدور:</label>
                    @endif
                    <input disabled type="text" name="type_id" value="{{$role->name}}" autofocus>
                </div>
                <a href="{{route("admin.roles.edit", $role->id)}}">
                    <button type="button" class="btn-edit">تعديل</button>
                </a>
                <button type="submit" class="btn-delete">حذف</button>
            </form>
        @endforeach
        {{ $roles->links() }}
    </div>
@endsection
