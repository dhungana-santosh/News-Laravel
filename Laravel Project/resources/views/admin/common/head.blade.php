@section('head')
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{URL::to('assets/bootstrap/dist/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::to('assets/custom.css')}}">
        <link rel="stylesheet" href="{{URL::to('assets/font-awesome/css/font-awesome.css')}}">

    <script>
        var baseURL="{{URL::to('/')}}";
        var csrf="{{csrf_token()}}";
    </script>
    </head>

    <body>
@endsection
