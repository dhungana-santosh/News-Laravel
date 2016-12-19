@include('admin.common.head')
@include('admin.common.foot')

@yield('head')
<h1>{{$subject}}</h1>
<p1>{{$mail}}</p1>

<p1>This email was sent by laravel app</p1>

@yield('foot')