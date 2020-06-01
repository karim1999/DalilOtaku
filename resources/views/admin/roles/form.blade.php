@extends('admin.layouts.app')

@section('content')
    <form class="form-container" method="post" action="{{isset($id) ? route("admin.roles.update", $id) : route("admin.roles.store")}}">
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
            <label for="name">اسم الدور بالانجليزية:</label>
            <input placeholder="اكتب الاسم بالانجليزية..." type="text" name="name" required value="{{isset($name) ? $name : ""}}" autofocus>
        </div>
        @foreach($permissions as $permission)
            <div style="flex-direction: row" class="input-container">
                <label style="flex: 1" for="permissions">{{__($permission->name)}}</label>
                <input style="flex: 1" type="checkbox" name="permissions[]" value="{{$permission->id}}" {{isset($role) && $role->hasPermissionTo($permission) ? "checked" : ""}} >
            </div>
        @endforeach
        <button type="submit">حفظ</button>
    </form>
@endsection
