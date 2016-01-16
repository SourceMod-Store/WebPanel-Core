{{--Copyright (c) 2015 "Werner Maisl"--}}

{{--This file is part of the Store Webpanel V2.--}}

{{--The Store Webpanel V2 is free software: you can redistribute it and/or modify--}}
{{--it under the terms of the GNU Affero General Public License as--}}
{{--published by the Free Software Foundation, either version 3 of the--}}
{{--License, or (at your option) any later version.--}}

{{--This program is distributed in the hope that it will be useful,--}}
{{--but WITHOUT ANY WARRANTY; without even the implied warranty of--}}
{{--MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the--}}
{{--GNU Affero General Public License for more details.--}}

{{--You should have received a copy of the GNU Affero General Public License--}}
{{--along with this program. If not, see <http://www.gnu.org/licenses/>.--}}

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

    <!-- Installer -->
    <link href="{{ asset('templates/installer/css/installer.css') }}" rel="stylesheet">

    @yield('head')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @yield('navbar')
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    @if (count($errors) > 0)
        @foreach ($errors->all() as $errors)
            <div class="alert alert-danger">
                <strong>Success!</strong> {{ $info }}<br><br>
            </div>
        @endforeach
    @endif

    @yield('body')
</div><!-- /.container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('templates/installer/js/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('templates/installer/bootstrap/js/bootstrap.min.js') }}"></script>
@yield('footer')
</body>
</html>