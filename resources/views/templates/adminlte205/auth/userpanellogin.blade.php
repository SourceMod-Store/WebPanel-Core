@extends('templates.adminlte205.auth.app')

@section('title', 'User Login')

@section('body-class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Store</b>UserPanel</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <a href="{{ SteamLogin::url(URL::route('userpanel.auth.steamlogin')) }}">Login via Steam!</a>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop