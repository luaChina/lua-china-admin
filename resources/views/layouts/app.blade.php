<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css', true) }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('components.header')
    <el-container>
        @includewhen(auth()->guard('admin')->check(), 'components.sidebar')
        <el-main>
            @yield('content')
        </el-main>
    </el-container>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js', true) }}"></script>
</body>
</html>
