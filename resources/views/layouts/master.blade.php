<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content={{csrf_token()}}>

    <title>Laravel Starter</title>

    <link rel="stylesheet" href="{{asset("/css/app.css")}}">
    <!-- <link rel="stylesheet" href="/css/app.css">  -->
     
    <link rel="stylesheet" href="{{asset("/dist/plugins/font-awesome/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("/dist/css/adminlte.min.css")}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset("/dist/plugins/iCheck/flat/blue.css")}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset("/dist/plugins/morris/morris.css")}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset("/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset("/dist/plugins/datepicker/datepicker3.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset("/dist/plugins/daterangepicker/daterangepicker-bs3.css")}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset("/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- IonIcons -->
    <!-- <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->

    @yield('css')

</head>

<body class="hold-transition sidebar-mini">
    @guest @yield('content') @else
    <div class="wrapper" id="app">
        <!-- Header -->
        @include('layouts.header')
        <!-- Sidebar -->
        @include('layouts.sidebar')
        @if(session()->has('notif'))
        <div class="main-header">
            <div class="content-header" id="alert" class="text-center">
                <div class="alert alert-success " style="opacity: 0.7; text-align: right" >
                  
                    {{session()->get('notif')}}
                </div>
            </div>
        </div>

        @endif
        @yield('content')
        <!-- Footer -->
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->
    @endguest 
    @yield('javascript')
    <script>
        $(document).ready(function() {

            $('#alert').delay(2000).hide(1);
        });
    </script>
    
</body>

</html>