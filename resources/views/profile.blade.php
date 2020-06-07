@extends('layouts.main')

@section('content')
    <div class="content no-padding">
        @if(!(isset($disable_secondary_nav) && $disable_secondary_nav))
            <div class="main-nav secondary-nav">
                <ul class="middle-nav">
                    <li class="{{ (request()->is('profile/favorites')) ? 'active' : '' }}"><a href="{{route("profile.favorites")}}"><i class="fa fa-heart"></i> المفضلة</a></li>
                    <li class="{{ (request()->is('profile/watching')) ? 'active' : '' }}"><a href="{{route("profile.watching")}}"><i class="fa fa-film"></i> الانميات المتابعة</a></li>
                    <li class="{{ (request()->is('profile/watched')) ? 'active' : '' }}"><a href="{{route("profile.watched")}}"><i class="fa fa-check-square"></i> تمت مشاهدتها</a></li>
                    <li class="{{ (request()->is('profile/later')) ? 'active' : '' }}"><a href="{{route("profile.later")}}"><i class="fa fa-video"></i> مشاهدة لاحقا</a></li>
                    <li class="{{ (request()->is('profile/bookmarked')) ? 'active' : '' }}"><a href="{{route("profile.bookmarked")}}"><i class="fa fa-bookmark"></i> الانميات المحفوظة</a></li>
                    <li class="{{ (request()->is('profile/settings')) ? 'active' : '' }}"><a href="{{route("profile.settings")}}"><i class="fa fa-cog"></i> الاعدادات</a></li>
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if(isset($animes))
            <div class="list-container col-11 version2" id="anime_list">
                @forelse ($animes as $anime)
                    @include("partials.anime_card2", ["anime" => $anime])
                @empty
                    <p class="empty">لا يوجد بيانات</p>
                @endforelse
                {{ $animes->links() }}
            </div>
        @else
            <form enctype="multipart/form-data" id="profileSettings" action="{{route("profile.edit")}}" method="post">
                <img style="border-radius: 100%; width: 64px; height: 64px" @click="changeImage" class="clickable" :src="img ? img : '{{Auth::user()->getFirstMediaUrl('avatar')}}'" alt="Profile Picture">
                <input @change="onFileChange" ref="img" type="file" name="avatar" hidden style="display: none">
                <p>اضغط لتغيير الصورة</p>
                <h4 class="unique2">تغيير اعدادات الملف الشخصي </h4>
                @csrf
                <div class="input-container">
                    <input placeholder="كلمة المرور..." type="password"  class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                    <img src="{{asset("assets/icons2/008-lock.svg")}}" alt="">
                </div>
                @error('password')
                <h6 class="unique text-right no-padding">{{ $message }}</h6>
                @enderror
                <div class="input-container">
                    <input placeholder="تكرار كلمة المرور..." type="password"  class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                    <img src="{{asset("assets/icons2/008-lock.svg")}}" alt="">
                </div>
                @error('password_conformation')
                <h6 class="unique text-right no-padding">{{ $message }}</h6>
                @enderror
                <button class="submit-button" type="submit">
                    حفظ
                </button>
            </form>
        @endif
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/animeList.js') }}" defer></script>
    <script src="{{ asset('js/profile.js') }}" defer></script>
@endsection
