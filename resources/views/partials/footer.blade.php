<div class="footer">
    <div class="top">
        <div class="col">
            <img src="{{asset("assets/footer/g22078@2x.png")}}" alt="">
            <p>{{\App\Setting::getOption("description")}}</p>
        </div>
        <div class="col">
            <img src="{{asset("assets/footer/image22014@2x.png")}}" alt="">
            <p>هنا نص غير حقيقي الهدف منه تعبئة الفراغ لا أكثر، يجب أن يوضع نص حــــقــيـــقـــي
                بدل منه عند برمجة الموقـع شـــرط أن يعبر عن الموقع وهدفه وما إلى ذلك.. أرجـو أن
                تــكون الفكرة وصلت :)</p>
        </div>
        <div class="col">
            <img src="{{asset("assets/footer/g22078@2x.png")}}" alt="">
            <div class="row">
                <a href="{{route("faq")}}">الأسئلة الشائعة</a>
                -
                <a href="{{route("policy")}}">سياسة الخصوصية</a>
                -
                <a href="{{route("who")}}">من نحن</a>
                -
                <a href="{{route("contact")}}">أتصل بنا</a>
            </div>
        </div>
    </div>
    <div class="middle">
        <div class="companies">
            @foreach(\App\Website::all() as $website)
                <a href="">
                    <img src="{{$website->getFirstMediaUrl('logo')}}" alt="">
                    <p class="h6">{{$website->title}}</p>
                </a>
            @endforeach
        </div>
    </div>
    <div class="bottom">
        <p class="text-right col">حميع الحقوق محفوظة لموقع دليل اوتاكو</p>
        <ul class="text-center">
            <a href="{{\App\Setting::getOption("facebook")}}"><i class="fab fa-facebook-square"></i></a>
            <a href="{{\App\Setting::getOption("twitter")}}"><i class="fab fa-twitter-square"></i></a>
            <a href="{{\App\Setting::getOption("instagram")}}"><i class="fab fa-instagram-square"></i></a>
        </ul>
        <p class="text-left col">مصمم من <span class="unique">Sasini</span></p>
    </div>
</div>
