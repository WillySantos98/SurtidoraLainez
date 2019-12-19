<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Surtidoara Lainez')</title>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Custom fonts for this template-->
    <link href="{{asset('css/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/ad7380e0a3.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>

    <script src="{{asset('css/vendor/jquery/jquery.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />

    <!-- If you use the default popups, use this. -->


    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />

    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />
{{--    --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/fullcalendar/fullcalendar.min.css')}}">
</head>

<body id="page-top">
<div id="wrapper">
    @include('Index.componentes.nav')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('Index.componentes.navtop')
            <div class="container-fluid">
{{--                @yield('content')--}}
                @section('content')
                    @include('Index.index')
                @show
            </div>
        </div>

        @include('Index.componentes.footer')
    </div>
</div>
</body>

</html>
