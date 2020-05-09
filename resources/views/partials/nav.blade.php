<div class="main-nav">
    <div class="start-nav">
        <a href="{{route("home")}}"><img src="{{asset("assets/logo-white.png")}}" alt=""></a>
    </div>
    <ul class="middle-nav">
        <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route("home")}}">الرئيسية</a></li>
        <li class="{{ (request()->is('news*')) ? 'active' : '' }}"><a href="{{route("news")}}">الاخبار</a></li>
        <li class="{{ (request()->is('later*')) ? 'active' : '' }}"><a href="">يعرض لاحقا</a></li>
        <li class="{{ (request()->is('calendar*')) ? 'active' : '' }}"><a href="{{route("calendar")}}">التقويم</a></li>
        <li class="{{ (request()->is('faq*')) ? 'active' : '' }}"><a href="{{route("faq")}}">الاسئلة الشائعة</a></li>
        <li class="{{ (request()->is('policy*')) ? 'active' : '' }}"><a href="{{route("policy")}}">سياسة الخصوصية</a></li>
        <li class="{{ (request()->is('terms*')) ? 'active' : '' }}"><a href="{{route("terms")}}">شروط الاستخدام</a></li>
        <li class="{{ (request()->is('who*')) ? 'active' : '' }}"><a href="{{route("who")}}">من نحن</a></li>
        <li  class="{{ (request()->is('contact*')) ? 'active' : '' }} no-padding"><a href="{{route("contact")}}">اتصل بنا</a></li>
    </ul>
    <ul class="end-nav">
        <li class="input-container no-padding">
            <input placeholder="ابحث في الموقع" type="text">
            <img src="{{asset("assets/icons2/002-search.svg")}}" alt="">
        </li>
        <li class="no-padding"><a href="{{route("home")}}"><img src="{{asset("assets/icons2/032-night.svg")}}" alt=""></a></li>
        <li class="no-padding"><a href="{{route("login")}}">دخول</a></li>
        <li><a href="{{route("register")}}"><button class="signup-button">تسجيل</button></a></li>
    </ul>
</div>
