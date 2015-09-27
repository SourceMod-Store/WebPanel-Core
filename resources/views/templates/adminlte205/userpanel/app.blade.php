<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WP2 | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('templates/adminlte205/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('templates/adminlte205/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('templates/adminlte205/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('templates/adminlte205/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('templates/adminlte205/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('templates/adminlte205/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @yield('head')
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header. Contains the Username, Notifications, ...-->
    @include('templates.adminlte205.userpanel.includes.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('templates.adminlte205.userpanel.includes.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('subtitle')</small>
            </h1>
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('templates.adminlte205.userpanel.includes.errorcallout')

            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0.0-beta.5
        </div>
        Copyright &copy; 2013-2015  Store Plugin: <strong>Alon Gubkin</strong>, <strong>Keith Warren (Drixevel)</strong> - &copy; 2015 WebPanel: <strong>Werner Maisl</strong>. All rights reserved.
    </footer>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="{{asset('templates/adminlte205/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{asset('templates/adminlte205/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src='{{asset('templates/adminlte205/plugins/fastclick/fastclick.min.js')}}'></script>
<!-- AdminLTE App -->
<script src="{{asset('templates/adminlte205/dist/js/app.min.js')}}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{asset('templates/adminlte205/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{asset('templates/adminlte205/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('templates/adminlte205/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="{{asset('templates/adminlte205/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<!-- datepicker -->
<script src="{{asset('templates/adminlte205/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{{asset('templates/adminlte205/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('templates/adminlte205/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{asset('templates/adminlte205/plugins/chartjs/Chart.min.js')}}" type="text/javascript"></script>

@yield('footer')

</body>
</html>