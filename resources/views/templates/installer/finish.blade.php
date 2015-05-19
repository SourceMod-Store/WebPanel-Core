@extends('templates.installer.app')

@section('title', 'Finish')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li><a href="#">Settings</a></li>
    <li><a href="#">User</a></li>
    <li class="active"><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="alert alert-success" role="alert">
        <strong>Setup Complete</strong><br>
        The Setup has been completed<br>
        <a href="{{ url('/webpanel') }}">Click here to log into the webpanel</a>
    </div>
@endsection
