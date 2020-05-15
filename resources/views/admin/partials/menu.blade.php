<div class="menu">
    <img src="{{asset("assets/logo.png")}}" alt="">
    <ul class="menu-list">
        <a href="{{route("admin.alert.form")}}"><li class="{{ (request()->is('admin/alert*')) ? 'active' : '' }}"><i class="fa fa-comment-dots"></i>الرسالة الترحيبية</li></a >
        <a href="{{route("admin.animes.index")}}"><li class="{{ (request()->is('admin/animes*')) ? 'active' : '' }}"><i class="fa fa-rocket"></i>قائمة الانمي</li></a>
        <a href="{{route("admin.categories.index")}}"><li class="{{ (request()->is('admin/categories*')) ? 'active' : '' }}"><i class="fa fa-book"></i>التصنيفات</li></a>
        <a href="{{route("admin.studios.index")}}"><li class="{{ (request()->is('admin/studios*')) ? 'active' : '' }}"><i class="fa fa-pen"></i>المنتجون</li></a>
        <a href="{{route("admin.alert.form")}}"><li class="{{ (request()->is('admin/banned*')) ? 'active' : '' }}"><i class="fa fa-ban"></i>قائمة المحظورات</li></a>
        <a href="{{route("admin.sources.index")}}"><li class="{{ (request()->is('admin/sources*')) ? 'active' : '' }}"><i class="fa fa-newspaper"></i>مصادر الاخبار</li></a>
        <a href="{{route("admin.users.index")}}"><li class="{{ (request()->is('admin/users*')) ? 'active' : '' }}"><i class="fa fa-users"></i>المستخدمون</li></a>
        <a href="{{route("admin.questions.index")}}"><li class="{{ (request()->is('admin/questions*')) ? 'active' : '' }}"><i class="fa fa-server"></i>الاسئلة الشائعة</li></a>
        <a href="{{route("admin.policy.form")}}"><li class="{{ (request()->is('admin/policy*')) ? 'active' : '' }}"><i class="fa fa-user-shield"></i>سياسة الخصوصية</li></a>
        <a href="{{route("admin.terms.form")}}"><li class="{{ (request()->is('admin/terms*')) ? 'active' : '' }}"><i class="fa fa-calendar-check"></i>شروط الاستخدام</li></a>
        <a href="{{route("admin.settings.form")}}"><li class="{{ (request()->is('admin/settings*')) ? 'active' : '' }}"><i class="fa fa-cog"></i>الاعدادات</li></a>
    </ul>
</div>
