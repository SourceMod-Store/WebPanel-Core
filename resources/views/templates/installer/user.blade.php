@extends('templates.installer.app')

@section('title', 'Create Admin User')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li><a href="#">Settings</a></li>
    <li class="active"><a href="#">User</a></li>
    <li><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="top-container">
        <p class="lead">
            This page will guide you though the setup of your user<br>
            Please Enter your Username, E-Mail Address and Password
        </p>
    </div>
    <div class="middle-container">
        <div class="form-group">
            {!! Form::label('username', 'Username') !!}
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::text('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirm', 'Confirm Password') !!}
            {!! Form::text('password_confirm', null, ['class' => 'form-control']) !!}
        </div>
        <div class="alert alert-success" role="alert">
            <strong>What happens Next</strong><br>
            A User with the provided credentials will be created<br>
            A Group that has full access to the webpanel will be created<br>
            The group will be assigned to the user<br>
        </div>

    </div>
    <div class="bottom-container">
        <div class="floatCenter">Step 3 / 4</div>
        <div class="floatRight">
            {!! Form::open(['method'=>'get','route' => 'installer.finish.show']) !!}
            {!! Form::submit("Proceed to Finish", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
