@include('admin.common.head')
@include('admin.common.foot')
@include('admin.common.nav')
@include('admin.common.top_bar')


@yield('head')
@yield('top_bar')
@yield('nav')


    @yield('content')
@yield('foot')

