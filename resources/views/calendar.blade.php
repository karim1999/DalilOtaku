@extends('layouts.main')
@section('title', 'التقويم')
@section('description', 'موقع انميات')

@section('content')
    <div class="content">
        <h4 class="unique2 text-right">السبت</h4>
        <div class="list-container col-12 version2">
            @forelse ($saturday as $anime)
                @include("partials.anime_card2", ["anime", $anime])
            @empty
                <p>لا يوجد بيانات</p>
            @endforelse
        </div>
        <h4 class="unique2 text-right">الاحد</h4>
        <div class="list-container col-12 version2">
            @forelse ($sunday as $anime)
                @include("partials.anime_card2", ["anime", $anime])
            @empty
                <p>لا يوجد بيانات</p>
            @endforelse
        </div>
        <h4 class="unique2 text-right">الاثنين</h4>
        <div class="list-container col-12 version2">
            @forelse ($monday as $anime)
                @include("partials.anime_card2", ["anime", $anime])
            @empty
                <p>لا يوجد بيانات</p>
            @endforelse
        </div>
        <h4 class="unique2 text-right">الثلثاء</h4>
        <div class="list-container col-12 version2">
            @forelse ($tuesday as $anime)
                @include("partials.anime_card2", ["anime", $anime])
            @empty
                <p>لا يوجد بيانات</p>
            @endforelse
        </div>
        <h4 class="unique2 text-right">الاربعاء</h4>
        <div class="list-container col-12 version2">
            @forelse ($wednesday as $anime)
                @include("partials.anime_card2", ["anime", $anime])
            @empty
                <p>لا يوجد بيانات</p>
            @endforelse
        </div>
        <h4 class="unique2 text-right">الخميس</h4>
        <div class="list-container col-12 version2">
            @forelse ($thursday as $anime)
                @include("partials.anime_card2", ["anime", $anime])
            @empty
                <p>لا يوجد بيانات</p>
            @endforelse
        </div>
        <h4 class="unique2 text-right">الجمعة</h4>
        <div class="list-container col-12 version2">
            @forelse ($friday as $anime)
                @include("partials.anime_card2", ["anime", $anime])
            @empty
                <p>لا يوجد بيانات</p>
            @endforelse
        </div>
    </div>

@endsection
