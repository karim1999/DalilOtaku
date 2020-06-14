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

        <form method="get" action="">
            <div class="splitter">
                <h4 class="unique">فلتر:</h4>
                <span></span>
            </div>
            <div class="section">
                <div class="input-container">
                    <label for="search">عدد النتائج/صفحة:</label>
                    <select name="num" id="">
                        @for($i= 1; $i*10 <= 100; $i++)
                            <option {{request()->input('num') == $i*10 ? "selected" : ""}} value="{{$i*10}}">{{$i*10}}</option>
                        @endfor
                    </select>
                </div>
                <div class="input-container">
                    <label for="search"> بحث عن:</label>
                    <input placeholder="بحث..." type="text" name="search" value="{{request()->input('search')}}">
                </div>
                <div class="input-container">
                    <label for="search"> الرتبة:</label>
                    <select name="role" id="">
                        @foreach(\Spatie\Permission\Models\Role::all() as $role)
                            <option {{request()->input('role') == $role->id ? "selected" : ""}}  value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button style="margin-bottom: 50px" type="submit">بحث</button>
        </form>
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
                        <label for="email">البريد الاكتروني:</label>
                    @endif
                        <input disabled type="text" name="email" value="{{$user->email}}" autofocus>
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
            {{ $users->links() }}
    </div>
@endsection
