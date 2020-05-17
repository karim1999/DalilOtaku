@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        <form enctype="multipart/form-data" method="post" action="{{route("admin.settings.action")}}">
            @method('PUT')
            @csrf
            @if (session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="splitter">
                <h4 class="unique">المتصفح:</h4>
                <span></span>
            </div>
            <div class="section">
                <div class="input-container">
                    <label for="icon">ايقونة الموقع:</label>
                    <input placeholder="اكتب عنوان الرسالة..." type="file" name="icon" value="" autofocus>
                </div>
                <div class="input-container">
                    <label for="title">اسم الموقع:</label>
                    <input placeholder="اكتب عنوان الموقع..." type="text" name="title" value="{{$title}}" autofocus>
                </div>
                <div class="input-container">
                    <label for="subtitle">عنوان فرعي:</label>
                    <input placeholder="اكتب عنوان فرعي..." type="text" name="subtitle" value="{{$subtitle}}" autofocus>
                </div>
                <div class="input-container flex-2">
                    <label for="description">وصف بسيط:</label>
                    <input placeholder="اكتب وصف الموقع..." type="text" name="description" value="{{$description}}" autofocus>
                </div>
            </div>
            <div class="splitter">
                <h4 class="unique">الموقع:</h4>
                <span></span>
            </div>
            <div class="section">
                <div class="input-container">
                    <label for="logo">شعار الموقع:</label>
                    <input placeholder="اكتب عنوان الرسالة..." type="file" name="logo" value="" autofocus>
                </div>
                <div class="flex-4"></div>
            </div>
            <div class="splitter">
                <h4 class="unique">ادوات جوجل</h4>
                <span></span>
            </div>
            <div class="section">
                <div class="input-container">
                    <label for="google_id">كود مصادقة جوجل:</label>
                    <input placeholder="اكتب كود مصادقة جوجل..." type="text" name="google_id" value="{{$google_id}}" autofocus>
                </div>
                <div class="input-container">
                    <label for="google">كود مصادقة جوجل:</label>
                    <input placeholder="اكتب كود مصادقة جوجل..." type="text" name="google" value="" autofocus>
                </div>
                <div class="flex-3"></div>
            </div>
            <div class="splitter">
                <h4 class="unique">الشبكات الاجتماعية:</h4>
                <span></span>
            </div>
            <div class="section">
                <div class="input-container">
                    <label for="facebook">فيسبوك:</label>
                    <input placeholder="فيسبوك..." type="text" name="facebook" value="{{$facebook}}" autofocus>
                </div>
                <div class="input-container">
                    <label for="twitter">تويتر:</label>
                    <input placeholder="تويتر..." type="text" name="twitter" value="{{$twitter}}" autofocus>
                </div>
                <div class="input-container">
                    <label for="instagram">انستجرام:</label>
                    <input placeholder="انستجرام..." type="text" name="instagram" value="{{$instagram}}" autofocus>
                </div>
                <div class="flex-2"></div>
            </div>
            <button type="submit">حفظ</button>
        </form>

        <div class="splitter">
            <h4 class="unique">المواقع التابع:</h4>
            <span></span>
        </div>
        <form enctype="multipart/form-data" class="section" method="post" action="{{route('admin.websites.store')}}">
            @method('POST')
            @csrf
            <div class="input-container">
                <label for="terms_title">الشعار:</label>
                <input type="file" name="logo" value="" required autofocus>
            </div>
            <div class="input-container">
                <label for="terms_title">الاسم:</label>
                <input placeholder="اكتب اسم الموقع..." type="text" name="title" value="" required autofocus>
            </div>
            <div class="input-container flex-2">
                <label for="terms_title">الرابط:</label>
                <input placeholder="اكتب رابط الموقع..." type="text" name="description" required value="" autofocus>
            </div>
            <button class="">اضافة</button>
        </form>
        @foreach($websites as $website)
            <form enctype="multipart/form-data" class="section base-line" method="post" action="{{route('admin.websites.update', $website->id)}}">
                @method('PUT')
                @csrf
                <div class="input-container">
                    <input type="file" name="logo" value="" autofocus>
                </div>
                <div class="input-container">
                    <input placeholder="اكتب اسم الموقع..." type="text" name="title" value="{{$website->title}}" required autofocus>
                </div>
                <div class="input-container flex-2">
                    <input placeholder="اكتب رابط الموقع..." type="text" name="description" value="{{$website->description}}" required autofocus>
                </div>
                <button type="submit" class="btn-edit">تعديل</button>
                <a href="{{route("admin.websites.destroy", $website->id)}}">
                    <button type="button" class="btn-delete">حذف</button>
                </a>
            </form>
        @endforeach
        <div class="splitter">
            <h4 class="unique">سكربتات:</h4>
            <span></span>
        </div>
        <form class="section base-line" method="post" action="{{route('admin.scripts.store')}}">
            @method('POST')
            @csrf
            <div class="input-container">
                <textarea placeholder="اكتب كود السكربت..." type="text" required name="script" autofocus></textarea>
            </div>
            <button class="" type="submit">اضافة</button>
        </form>
        @foreach($scripts as $script)
            <form class="section base-line" method="post" action="{{route('admin.scripts.update', $script->id)}}">
                @method('PUT')
                @csrf
                <div class="input-container">
                    <textarea placeholder="اكتب كود السكربت..." type="text" required name="script" autofocus>{{$script->script}}</textarea>
                </div>
                <button type="submit" class="btn-edit">تعديل</button>
                <a href="{{route("admin.scripts.destroy", $script->id)}}">
                    <button type="button" class="btn-delete">حذف</button>
                </a>
            </form>
        @endforeach
    </div>
@endsection
