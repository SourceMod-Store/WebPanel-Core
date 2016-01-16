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
    {!! Form::open(['method'=>'get','route' => 'installer.finish.show']) !!}
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
            {!! Form::submit("Proceed to Finish", ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
