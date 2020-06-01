<div class="menu">
    <img src="{{asset("assets/logo.png")}}" alt="">
    <ul class="menu-list">
        @can("welcome")
            <a href="{{route("admin.alert.form")}}"><li class="{{ (request()->is('admin/alert*') || request()->is('admin')) ? 'active' : '' }}"><i class="fa fa-comment-dots"></i>الرسالة الترحيبية</li></a >
        @endcan
        @can("access animes")
            <a href="{{route("admin.animes.index")}}"><li class="{{ (request()->is('admin/animes*')) ? 'active' : '' }}"><i class="fa fa-rocket"></i>قائمة الانمي</li></a>
        @endcan
        @can("access genres")
            <a href="{{route("admin.genres.index")}}"><li class="{{ (request()->is('admin/genres*')) ? 'active' : '' }}"><i class="fa fa-book"></i>التصنيفات</li></a>
        @endcan
        @can("access studios")
            <a href="{{route("admin.studios.index")}}"><li class="{{ (request()->is('admin/studios*')) ? 'active' : '' }}"><i class="fa fa-pen"></i>المنتجون</li></a>
        @endcan
        @can("access ban")
            <a href="{{route("admin.banned.animes")}}"><li class="{{ (request()->is('admin/banned*')) ? 'active' : '' }}"><i class="fa fa-ban"></i>قائمة المحظورات</li></a>
        @endcan
        @can("access sources")
            <a href="{{route("admin.sources.index")}}"><li class="{{ (request()->is('admin/sources*')) ? 'active' : '' }}"><i class="fa fa-newspaper"></i>مصادر الاخبار</li></a>
        @endcan
        @can("access users")
            <a href="{{route("admin.users.index")}}"><li class="{{ (request()->is('admin/users*')) ? 'active' : '' }}"><i class="fa fa-users"></i>المستخدمون</li></a>
        @endcan
        @can("access roles")
            <a href="{{route("admin.roles.index")}}"><li class="{{ (request()->is('admin/roles*')) ? 'active' : '' }}"><i class="fa fa-users"></i>الادوار والصلاحيات</li></a>
        @endcan
        @can("access questions")
            <a href="{{route("admin.questions.index")}}"><li class="{{ (request()->is('admin/questions*')) ? 'active' : '' }}"><i class="fa fa-server"></i>الاسئلة الشائعة</li></a>
        @endcan
        @can("policy")
            <a href="{{route("admin.policy.form")}}"><li class="{{ (request()->is('admin/policy*')) ? 'active' : '' }}"><i class="fa fa-user-shield"></i>سياسة الخصوصية</li></a>
        @endcan
        @can("terms")
            <a href="{{route("admin.terms.form")}}"><li class="{{ (request()->is('admin/terms*')) ? 'active' : '' }}"><i class="fa fa-calendar-check"></i>شروط الاستخدام</li></a>
        @endcan
        @can("settings")
            <a href="{{route("admin.settings.form")}}"><li class="{{ (request()->is('admin/settings*')) ? 'active' : '' }}"><i class="fa fa-cog"></i>الاعدادات</li></a>
        @endcan
        <a href="{{route("logout")}}"><li class="{{ (request()->is('logout')) ? 'active' : '' }}"><i class="fa fa-sign-out-alt"></i>تسجيل الخروج</li></a>
    </ul>
</div>
