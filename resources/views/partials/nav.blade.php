<div class="main-nav" id="nav">
    <template v-if="!showMenu">
        <i @click="menuToggle" class="fa fa-bars hidden sm-only nav-icon nav-open-icon clickable"></i>
        <ul class="middle-nav hidden sm-only">
            <li class="start-nav always-shown"><a href="{{route("home")}}"><img src="{{asset("assets/logo-white.png")}}" alt=""></a></li>
        </ul>
    </template>
    <i @click="menuToggle" :class="['fa fa-times hidden sm-only nav-icon nav-close-icon clickable', showMenu ? showClass : hideClass]"></i>
    <ul :class="['middle-nav', showMenu ? showClass : hideClass]">
        <li class="start-nav always-shown"><a href="{{route("home")}}"><img src="{{isset($settings) ? $settings['logo']->getFirstMediaUrl('logo') : \App\Setting::getOption("logo", false)->getFirstMediaUrl('logo')}}" alt=""></a></li>
        <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route("home")}}">الرئيسية</a></li>
        <li class="{{ (request()->is('news*')) ? 'active' : '' }}"><a href="{{route("news")}}">الاخبار</a></li>
        <li class="{{ (request()->is('later')) ? 'active' : '' }}"><a href="{{route("home.later")}}">يعرض لاحقا</a></li>
        <li class="{{ (request()->is('calendar*')) ? 'active' : '' }}"><a href="{{route("calendar")}}">التقويم</a></li>
        <li class="{{ (request()->is('faq*')) ? 'active' : '' }}"><a href="{{route("faq")}}">الاسئلة الشائعة</a></li>
        <li class="{{ (request()->is('policy*')) ? 'active' : '' }}"><a href="{{route("policy")}}">سياسة الخصوصية</a></li>
        <li class="{{ (request()->is('terms*')) ? 'active' : '' }}"><a href="{{route("terms")}}">شروط الاستخدام</a></li>
        {{--        <li class="{{ (request()->is('who*')) ? 'active' : '' }}"><a href="{{route("who")}}">من نحن</a></li>--}}
        <li  class="{{ (request()->is('contact*')) ? 'active' : '' }} no-padding"><a href="{{route("contact")}}">اتصل بنا</a></li>
    </ul>
    <ul :class="['end-nav', showMenu ? showClass : hideClass]">
        <li class="input-container no-padding">
            <form class="search-form" ref="searchForm" method="get" action="{{route("search")}}">
                <div class="input-container">
                    <input ref="search" @input="search" value="{{request()->input('search')}}" placeholder="ابحث في الموقع" name="search" type="text">
                    <img class="clickable" @click="$refs['searchForm'].submit()" src="{{asset("assets/icons2/002-search.svg")}}" alt="">
                </div>
                <div v-if="results.length >= 1" class="results">
                    <ul>
                        <li v-for="result in results" @click="changeSearch(result.title_en)" class="clickable">
                            <img :src="result.image_url" alt="">
                            <div class="left">
                                <h5>@{{result.title}}</h5>
                                <h6>@{{result.title_en}}</h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </form>
        </li>
        <a href="" @click="themeToggle">
            <template v-if="live">
                <li v-if="mode != 'dark'" class="no-padding"><img src="{{asset("assets/icons2/032-night.svg")}}" alt=""></li>
                <li v-else class="no-padding"><img src="{{asset("assets/icons2/dark.svg")}}" alt=""></li>
            </template>
            <template v-else>
                @if(isset($_COOKIE['mode']) && $_COOKIE['mode'] == "dark")
                    <li class="no-padding"><img src="{{asset("assets/icons2/dark.svg")}}" alt=""></li>
                @else
                    <li class="no-padding"><img src="{{asset("assets/icons2/032-night.svg")}}" alt=""></li>
                @endif
            </template>
        </a>

        @auth
            <li class="no-padding"><a href="{{route("profile.favorites")}}"><img class="profile-img" src="{{Auth::user()->getFirstMediaUrl('avatar')}}" alt=""></a></li>
            <li class="no-padding"><a href="{{route("logout")}}">تسجيل الخروج</a></li>
        @endauth
        @guest
            <li class="no-padding"><a href="{{route("login")}}">دخول</a></li>
            <li><a href="{{route("register")}}"><button class="signup-button">تسجيل</button></a></li>
        @endguest
    </ul>
    <template v-if="live">
        <link v-if="mode == 'dark'" href="{{ asset('css/dark.css') }}" rel="stylesheet">
        <link v-else href="{{ asset('css/app.css') }}" rel="stylesheet">
    </template>
</div>
