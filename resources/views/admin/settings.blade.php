@extends('admin.layouts.app')

@section('content')
    <div class="form-container" >
        <form method="post" action="{{route("admin.settings.action")}}">
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
        <form class="section">
            <div class="input-container">
                <label for="terms_title">الشعار:</label>
                <input placeholder="اكتب عنوان الرسالة..." type="file" name="icon" value="" autofocus>
            </div>
            <div class="input-container">
                <label for="terms_title">الاسم:</label>
                <input placeholder="اكتب اسم الموقع..." type="text" name="google" value="" autofocus>
            </div>
            <div class="input-container flex-2">
                <label for="terms_title">الرابط:</label>
                <input placeholder="اكتب رابط الموقع..." type="text" name="link" value="" autofocus>
            </div>
            <button class="">اضافة</button>
        </form>
        @for($i=0; $i < 3; $i++)
            <form class="section base-line">
                <div class="input-container">
                    <input placeholder="اكتب عنوان الرسالة..." type="file" name="icon" value="" autofocus>
                </div>
                <div class="input-container">
                    <input placeholder="اكتب اسم الموقع..." type="text" name="google" value="" autofocus>
                </div>
                <div class="input-container flex-2">
                    <input placeholder="اكتب رابط الموقع..." type="text" name="link" value="" autofocus>
                </div>
                <button class="btn-edit">تعديل</button>
                <button class="btn-delete">حذف</button>
            </form>
        @endfor
        <div class="splitter">
            <h4 class="unique">سكربتات:</h4>
            <span></span>
        </div>
        <form class="section base-line">
            <div class="input-container">
                <textarea placeholder="اكتب كود السكربت..." type="text" name="description" autofocus></textarea>
            </div>
            <button class="">اضافة</button>
        </form>
        <form class="section base-line">
            <div class="input-container">
                <textarea placeholder="اكتب كود السكربت..." type="text" name="description" autofocus></textarea>
            </div>
            <button class="btn-edit">تعديل</button>
            <button class="btn-delete">حذف</button>
        </form>
    </div>
@endsection
