@extends('admin.layouts.app')

@section('content')
    <form enctype="multipart/form-data" class="form-container" method="post" action="{{isset($id) ? route("admin.users.update", $id) : route("admin.users.store")}}">
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
        @if ($errors->any())
            <div class="alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="input-container">
            <label for="name">الاسم:</label>
            <input placeholder="اكتب اسم المستخدم..." type="text" name="name" required value="{{isset($name) ? $name : ""}}" autofocus>
        </div>
        @if(!isset($id))
            <div class="input-container">
                <label for="email">البريد الالكتروني:</label>
                <input placeholder="اكتب البريد الالكتروني..." type="email" name="email" required value="{{isset($email) ? $email : ""}}" autofocus>
            </div>
        @endif
        <div class="input-container">
            <label for="role">رتبة المستخدم:</label>
            <select name="role" id="">
                @foreach($roles as $role)
                    <option value="{{$role->name}}" {{isset($id) && \App\User::findOrFail($id)->hasRole($role->name) ? 'selected' : ""}}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-container">
            <label for="password">كلمة المرور:</label>
            <input placeholder="اكتب كلمة المرور..." type="password" name="password" {{isset($id) ? "" : "required"}}>
        </div>
        <div class="input-container">
            <label for="password_confirmation">تكرار كلمة المرور:</label>
            <input placeholder="اعد كتابة كلمة المرور..." type="password" name="password_confirmation" {{isset($id) ? "" : "required"}}>
        </div>
        <div class="input-container">
            <label for="avatar">الصورة الشخصية:</label>
            <input type="file" name="avatar" autofocus>
        </div>

        <button type="submit">حفظ</button>
    </form>
@endsection
