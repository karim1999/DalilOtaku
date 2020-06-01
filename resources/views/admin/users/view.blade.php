@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        @can("add users")
            <a href="{{route("admin.users.create")}}"><button class="add-btn">اضف</button></a>
        @endcan
        @foreach($users as $user)
            <form class="section {{$loop->first ? "" : "base-line"}}" method="post" action="{{route("admin.users.destroy", $user->id)}}">
                @method('DELETE')
                @csrf
                <div class="img-container flex-1">
                    <img class="profile-img" src="{{$user->getFirstMediaUrl('avatar')}}" alt="">
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="name">الاسم:</label>
                    @endif
                    <input disabled type="text" name="type_id" value="{{$user->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="role">الرتبة:</label>
                    @endif
                    <input disabled type="text" name="role" value="{{$user->roles()->first()->name}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    @if($loop->first)
                        <label for="role">تاريخ الاضافة:</label>
                    @endif
                    <input disabled type="text" name="role" value="{{$user->created_at}}" autofocus>
                </div>
                <a href="{{route("admin.users.edit", $user->id)}}">
                    @can("edit users")
                        <button type="button" class="btn-edit">تعديل</button>
                    @endcan
                </a>
                @can("delete users")
                    <button type="submit" class="btn-delete">حذف</button>
                @endcan
            </form>
        @endforeach
    </div>
@endsection
