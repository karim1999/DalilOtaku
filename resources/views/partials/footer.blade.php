<div class="footer">
    <div class="top">
        <div class="col">
            <img src="{{asset("assets/footer/g22078@2x.png")}}" alt="">
            <p>{{ isset($settings) ? $settings['description']->value : \App\Setting::getOption("description")}}</p>
        </div>
        <div class="col">
            <img src="{{asset("assets/footer/image22014@2x.png")}}" alt="">
            <p>هنا نص غير حقيقي الهدف منه تعبئة الفراغ لا أكثر، يجب أن يوضع نص حــــقــيـــقـــي
                بدل منه عند برمجة الموقـع شـــرط أن يعبر عن الموقع وهدفه وما إلى ذلك.. أرجـو أن
                تــكون الفكرة وصلت :)</p>
        </div>
        <div class="col">
            <img src="{{isset($settings) ? $settings['description']->getFirstMediaUrl('logo') : \App\Setting::getOption("logo", false)->getFirstMediaUrl('logo')}}" alt="">
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
{{--    <div class="middle">--}}
{{--        <div class="companies">--}}
{{--            @foreach(\App\Website::all() as $website)--}}
{{--                <a href="">--}}
{{--                    <img src="{{$website->getFirstMediaUrl('logo')}}" alt="">--}}
{{--                    <p class="h6">{{$website->title}}</p>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="bottom">
        <p class="text-right col">حميع الحقوق محفوظة لموقع دليل اوتاكو</p>
        <ul class="text-center">
            <a href="{{isset($settings) ? $settings['facebook']->value : \App\Setting::getOption("facebook")}}"><i class="fab fa-facebook-square"></i></a>
            <a href="{{isset($settings) ? $settings['twitter']->value : \App\Setting::getOption("twitter")}}"><i class="fab fa-twitter-square"></i></a>
            <a href="{{isset($settings) ? $settings['instagram']->value : \App\Setting::getOption("instagram")}}"><i class="fab fa-instagram-square"></i></a>
        </ul>
        <p class="text-left col">مصمم من <span class="unique">Sasini</span></p>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" integrity="sha256-+2SfyuYhd9/mPmcIHdzrgwtc4fBaQYTpu7fYesS49OU=" crossorigin="anonymous" async></script>
