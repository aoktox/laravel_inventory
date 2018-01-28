<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--Title and Meta--}}
    <title>@yield('title')</title>

    {{--Common App Styles--}}
    <link href="{{mix('assets/css/app.css')}}" rel="stylesheet">
    <link href="{{mix('assets/css/main.css')}}" rel="stylesheet">

    {{--Styles--}}
    @yield('styles')

    {{--Head--}}
    @yield('head')

</head>
<body class="@yield('body_class')">

{{--Page--}}
@yield('page')

{{--Common Scripts--}}
<script src="{{ mix('assets/js/main.js') }}"></script>
<script src="{{ mix('assets/js/app.js') }}"></script>

{{--Scripts--}}
@yield('scripts')
</body>
</html>