@extends('templates.installer.app')

@section('title', 'Settings')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li class="active"><a href="#">Settings</a></li>
    <li><a href="#">User</a></li>
    <li><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="top-container">
        <p class="lead">
            This page will guide you though the setup of your environment<br>
            It will ask you for you database credentials, mail queue and session driver as well as your E-Mail Settings
        </p>
    </div>
    <div class="middle-container">
        <div class="alert alert-info" role="alert">
            <strong>Generic Application Settings</strong> This are some General Settings for the Application
        </div>
        <div class="form-group">
            {!! Form::label('app_env', 'Environment') !!}
            {!! Form::text('app_env', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('app_debug', 'Debug') !!}
            {!! Form::text('app_debug', 'false', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('app_key', 'Key') !!}
            {!! Form::text('app_key', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('app_url', 'URL') !!}
            {!! Form::text('app_url', null, ['class' => 'form-control']) !!}
        </div>

        <div class="alert alert-info" role="alert">
            <strong>WebPanel Database Configuration</strong> This are the Database Settings for the Webpanel
        </div>
        <div class="form-group">
            {!! Form::label('db_host_webpanel', 'Webpanel Database Host') !!}
            {!! Form::text('db_host_webpanel', 'localhost', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_name_webpanel', 'Webpanel Database Name') !!}
            {!! Form::text('db_name_webpanel', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_user_webpanel', 'Webpanel Database User') !!}
            {!! Form::text('db_user_webpanel', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_pass_webpanel', 'Webpanel Database Password') !!}
            {!! Form::text('db_pass_webpanel', null, ['class' => 'form-control']) !!}
        </div>

        <div class="alert alert-info" role="alert">
            <strong>Plugin Database Configuration</strong> This are the Database Settings to access the database of the Server-Side Plugin
        </div>
        <div class="form-group">
            {!! Form::label('db_host_store', 'Store Database Host') !!}
            {!! Form::text('db_host_store', 'localhost', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_name_store', 'Store Database Name') !!}
            {!! Form::text('db_name_store', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_user_store', 'Store Database User') !!}
            {!! Form::text('db_user_store', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_pass_store', 'Store Database Password') !!}
            {!! Form::text('db_pass_store', null, ['class' => 'form-control']) !!}
        </div>

        <div class="alert alert-info" role="alert">
            <strong>Driver Configuration</strong> This is the driver configuration
        </div>
        <div class="form-group">
            {!! Form::label('cache_driver', 'Cache Driver') !!}
            {!! Form::text('cache_driver', 'local', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('session_driver', 'Session Driver') !!}
            {!! Form::text('session_driver', 'local', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('queue_driver', 'Queue Driver') !!}
            {!! Form::text('queue_driver', 'local', ['class' => 'form-control']) !!}
        </div>

        <div class="alert alert-info" role="alert">
            <strong>Mail Configuration</strong> This is the mail configuration
        </div>
        <div class="form-group">
            {!! Form::label('mail_driver', 'Mail Driver') !!}
            {!! Form::text('mail_driver', 's,tp', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_host', 'Mail Host') !!}
            {!! Form::text('session_driver', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_port', 'Mail Port') !!}
            {!! Form::text('mail_port', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_username', 'Mail Username') !!}
            {!! Form::text('mail_username', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_password', 'Session Driver') !!}
            {!! Form::text('mail_password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_from_adr', 'Mail Sender Address') !!}
            {!! Form::text('mail_from_adr', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_from_name', 'Mail Sender Name') !!}
            {!! Form::text('mail_from_name', null, ['class' => 'form-control']) !!}
        </div>


    </div>
    <div class="bottom-container">
        <div class="floatCenter">Step 2 / 4</div>
        <div class="floatRight">
            {!! Form::open(['method'=>'get','route' => 'installer.users.show']) !!}
            {!! Form::submit("Proceed to User Setup", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection