@extends('layouts.main')
@section('title', 'اخر االحبار')
@section('description', 'موقع انميات')

@section('content')
    <div class="content news col-md-12 col-9">
        <div class="filter col-sm-12">
            <h4 class="unique2 text-center">خيارات العرض</h4>
            <ul class="list-container text-right" id="dropdown">
                <li class="active"><a href=""><i></i> عرض كل النتائج</a><i class="far fa-check-circle"></i></li>
                <drop-down-item title=" مواقع الكترونية" icon-name="fa fa-newspaper" status="1">
                    <li><a href="">انمي داون</a></li>
                    <li><a href="">انميا</a></li>
                    <li><a href="">محبي الانمي</a></li>
                    <li><a href="">اتاكونا</a></li>
                    <li><a href="">اوتاكوا بيديا</a></li>
                </drop-down-item>
                <drop-down-item title=" حسابات تويتر" icon-name="fab fa-twitter-square"></drop-down-item>
                <drop-down-item title=" حسابات فيسبوك" icon-name="fab fa-facebook-square"></drop-down-item>
                <drop-down-item title=" حسابات انستجرام" icon-name="fab fa-instagram-square"></drop-down-item>
                <drop-down-item title=" حسب التاريخ" icon-name="fa fa-calendar-alt" status="1">
                    <input placeholder="من..." type="text" name="from">
                    <input placeholder="الي..." type="text" name="to">
                    <button>أعرض</button>
                </drop-down-item>
            </ul>
        </div>
        <div class="news-area">
            @for ($i = 0; $i < 5; $i++)
                <div class="news-item">
                    <img src="{{asset("assets/news1.png")}}" alt="">
                    <div class="left-container">
                        <div class="top">
                            <h4>سورد ارد اونلاين اليزايزيشن</h4>
                            <p>ذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                        </div>
                        <div class="bottom">
                            <h4 class="unique">اواكو بيديا</h4>
                            <div class="bottom-left">
                                <h5 class="date">15-10-2018</h5>
                                <button>اقرأ المزيد</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dropdown.js') }}" defer></script>
@endsection
