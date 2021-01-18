<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="mobile-web-app-capable" content="no">
    <meta name="apple-mobile-web-app-capable" content="no">
    <meta name="application-name" content="hology">
    <meta name="apple-mobile-web-app-title" content="hology">
    <meta name="theme-color" content="#00bfb6">
    <meta name="msapplication-navbutton-color" content="#00bfb6">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
{{--    <meta name="msapplication-starturl" content="https://mschaumann.dev">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--------------------------------favicon-------------------------------->
    <link rel="icon" type="image/png" sizes="180x180" href="{{secure_asset("assets/img/favicon")}}/apple-touch-icon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="{{secure_asset("assets/img/favicon")}}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{secure_asset("assets/img/favicon")}}/favicon-32x32.png">
    <link rel="apple-touch-icon" type="image/png" sizes="32x32" href="{{secure_asset("assets/img/favicon")}}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{secure_asset("assets/img/favicon")}}/favicon-16x16.png">
    <link rel="apple-touch-icon" type="image/png" sizes="16x16" href="{{secure_asset("assets/img/favicon")}}/favicon-16x16.png">
    {{--<link rel="manifest" href="{{secure_asset("webmanifest.json")}}">--}}
    <!----------------------------------css---------------------------------->
    @push('css')
        <link rel="stylesheet" href="{{secure_asset("assets/css/bootstrap/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{secure_asset("assets/css/style.css")}}">
    @endpush
    @stack('css')
    <title>@yield('title')</title>
</head>
<body>
@include('partials.alerts')
@yield('container')
@prepend('js')
<script src="{{secure_asset("assets/js/jquery/jquery-3.5.1.min.js")}}"></script>
@endprepend
@stack('js')
</body>
</html>
