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

@extends('templates.installer.app')

@section('title', 'Settings')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li class="active"><a href="#">Settings</a></li>
    <li><a href="#">Setup Database</a></li>
    <li><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="top-container">
        <p class="lead">
            This page will guide you though the setup of your environment<br>
            It will ask you for you database credentials, mail queue and session driver as well as your E-Mail Settings
        </p>
    </div>
    {!! Form::open(['method'=>'post','route' => 'installer.settings.post']) !!}
    <div class="middle-container">

        <div class="alert alert-info" role="alert">
            <strong>WebPanel Database Configuration</strong> This are the Database Settings for the Webpanel
        </div>
        <div class="form-group">
            {!! Form::label('db_host_panel', 'Webpanel Database Host') !!}
            {!! Form::text('db_host_panel', 'localhost', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_database_panel', 'Webpanel Database Name') !!}
            {!! Form::text('db_database_panel', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_prefix_panel', 'Webpanel Database Prefix') !!}
            {!! Form::text('db_prefix_panel', 'webpanel_', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_username_panel', 'Webpanel Database User') !!}
            {!! Form::text('db_username_panel', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_password_panel', 'Webpanel Database Password') !!}
            {!! Form::text('db_password_panel', null, ['class' => 'form-control']) !!}
        </div>

        <div class="alert alert-info" role="alert">
            <strong>Plugin Database Configuration</strong> This are the Database Settings to access the database of the Server-Side Plugin
        </div>
        <div class="form-group">
            {!! Form::label('db_host_store', 'Store Database Host') !!}
            {!! Form::text('db_host_store', 'localhost', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_database_store', 'Store Database Name') !!}
            {!! Form::text('db_database_store', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_prefix_store', 'Store Database Prefix') !!}
            {!! Form::text('db_prefix_store', 'store_', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_username_store', 'Store Database User') !!}
            {!! Form::text('db_username_store', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('db_password_store', 'Store Database Password') !!}
            {!! Form::text('db_password_store', null, ['class' => 'form-control']) !!}
        </div>

        <div class="alert alert-info" role="alert">
            <strong>Mail Configuration</strong> This is the Mail Configuration
        </div>

        <div class="form-group">
            {!! Form::label('mail_from_adr', 'Mail Sender Address') !!}
            {!! Form::text('mail_from_adr', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_from_name', 'Mail Sender Name') !!}
            {!! Form::text('mail_from_name', "Store WebPanel", ['class' => 'form-control']) !!}
        </div>


        <div class="alert alert-warning" role="alert">
           <strong>The settings below are optional.</strong><br>
            Usually you are safe to leave them as they are
        </div>
        <div class="alert alert-info" role="alert">
            <strong>Driver Configuration</strong> This is the driver configuration
        </div>
        <div class="form-group">
            {!! Form::label('cache_driver', 'Cache Driver') !!}
            {!! Form::text('cache_driver', 'file', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('session_driver', 'Session Driver') !!}
            {!! Form::text('session_driver', 'file', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('queue_driver', 'Queue Driver') !!}
            {!! Form::text('queue_driver', 'sync', ['class' => 'form-control']) !!}
        </div>

        <div class="alert alert-info" role="alert">
            <strong>Mail Driver Configuration</strong> This configures the mail driver
        </div>
        <div class="form-group">
            {!! Form::label('mail_driver', 'Mail Driver') !!}
            {!! Form::text('mail_driver', 'smtp', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mail_host', 'Mail Host') !!}
            {!! Form::text('mail_host', null, ['class' => 'form-control']) !!}
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
    </div>
    <div class="bottom-container">
        <div class="floatCenter">Step 2 / 4</div>
        <div class="floatRight">
            {!! Form::submit("Proceed to User Setup", ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection