@extends('layouts.main')

@section('content')
<div class="content no-padding">
    <div class="alert-info col-6 col-md-10">
        <h4>اطلاق موقع دليل انمي</h4>
        <p>ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
        </p>
    </div>
    <div class="main-nav secondary-nav">
        <ul class="middle-nav">
            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route("home")}}"><i class="fa fa-list unique"></i></a></li>
            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route("home")}}">عرض الكل</a></li>
            <li class="{{ (request()->is('category/spring')) ? 'active' : '' }}"><a href=""><i class="fa fa-cloud-sun"></i> الربيع</a></li>
            <li class="{{ (request()->is('category/spring')) ? 'active' : '' }}"><a href=""><i class="fa fa-sun"></i> الصيف</a></li>
            <li class="{{ (request()->is('category/spring')) ? 'active' : '' }}"><a href=""><i class="fa fa-leaf"></i> الخريف</a></li>
            <li class="{{ (request()->is('category/spring')) ? 'active' : '' }}"><a href=""><i class="fa fa-snowflake"></i> الشتاء</a></li>
            <li class="{{ (request()->is('/anime')) ? 'active' : '' }}"><a href="{{route("home")}}">انمي</a></li>
            <li class="{{ (request()->is('/manga')) ? 'active' : '' }}"><a href="{{route("home")}}">مانجا</a></li>
            <li class="{{ (request()->is('/ova')) ? 'active' : '' }}"><a href="{{route("home")}}">اوفا</a></li>
            <li class="{{ (request()->is('/ona')) ? 'active' : '' }}"><a href="{{route("home")}}">اونا</a></li>
            <li class="{{ (request()->is('/movie')) ? 'active' : '' }}"><a href="{{route("home")}}">افلام</a></li>
            <li class="{{ (request()->is('/airing')) ? 'active' : '' }}"><a href="{{route("home")}}">انمي مستمر</a></li>
        </ul>
    </div>
    <div class="list-container">
        @for ($i = 0; $i < 6; $i++)
            <div class="list-item">
                <div class="anime-container">
                    <div class="top">
                        <h5 class="ar-title text-center">سورد ارد اونلاين اليزايزيشن</h5>
                        <h6 class="en-title text-center">Sword Art Online Alicization</h6>
                        <ul class="categories row">
                            <li>
                                <a href="">
                                    اكشن
                                </a>
                            </li>
                            -
                            <li>
                                <a href="">
                                    دراما
                                </a>
                            </li>
                            -
                            <li>
                                <a href="">
                                    رعب
                                </a>
                            </li>
                            -
                            <li>
                                <a href="">
                                    ميكا
                                </a>
                            </li>
                            -
                            <li>
                                <a href="">
                                    حريم
                                </a>
                            </li>
                            -
                            <li>
                                <a href="">
                                    شونين
                                </a>
                            </li>
                            -
                            <li>
                                <a href="">
                                    خارق للطبيعة
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="middle row">
                        <img src="{{asset("assets/anime.png")}}" alt="">
                        <div class="left">
                            <ul>
                                <li><i class="fa fa-calendar-alt unique"></i>15 اكتوبر 2018</li>
                                <li><i class="fa fa-star unique"></i>التقييم: 5 نجوم</li>
                                <li><i class="fa fa-film unique"></i>12 حلقة</li>
                                <li><i class="fa fa-pen unique"></i>استديو قبلي</li>
                                <li><i class="fa fa-play-circle unique"></i>الحلقة 4 بعد 3 يوم 4 ساعات 20 دقيقة</li>
                            </ul>
                            <p>ذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                <br>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <ul class="sources row">
                            <li><a href=""><img src="{{asset("assets/icons1/aDB.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/AL.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/AP.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/aS.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/Face.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/Fox.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/Inst.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/link.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/MAL.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/Moon.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/Twit.svg")}}" alt=""></a></li>
                            <li><a href=""><img src="{{asset("assets/icons1/Yout.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="actions-area row">
                    <p class="clickable">32<i class="far fa-bookmark"></i></p>
                    <p class="clickable">20<i class="far fa-heart"></i></p>
                    <i class="fa fa-ellipsis-v clickable"></i>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
