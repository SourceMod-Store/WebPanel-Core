<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>WP2 Installer | @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('templates/installer/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body>
@yield('body')
<h1>Hello, world!</h1>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('templates/installer/js/jquery_1_11_2.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('templates/installer/bootstrap/js/bootstrap.min.js') }}"></script>
@yield('footer')
</body>
</html>