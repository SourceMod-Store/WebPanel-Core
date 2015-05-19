@extends('templates.installer.app')

@section('title', 'Welcome')

@section('navbar')
    <li class="active"><a href="#">Welcome</a></li>
    <li><a href="#">Settings</a></li>
    <li><a href="#">User</a></li>
    <li><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="top-container">
        <h1>Webpanel Installer</h1>
        <p class="lead">
            This is the installer for the WebPanel<br>
            Please make sure to read the instructions carefully.
        </p>
    </div>
    <div class="middle-container">
        <div class="alert alert-danger" role="alert">
            <strong>Error!</strong> This is an example for an Error. You have to fix any issues mentioned here before you can proceed
        </div>
        <div class="alert alert-info" role="alert">
            <strong>Heads up!</strong> This is a example for a info message. If you see this. Read it. It offers helpful advice
        </div>
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> This is a example for a success message. This means you have successfully performed an action
        </div>
    </div>
    <div class="bottom-container">
        <div class="floatCenter">
            Step 1 / 4</div>
        <div class="floatRight">
            {!! Form::open(['method'=>'get','route' => 'installer.settings.show']) !!}
            {!! Form::submit("Proceed to Settings", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
