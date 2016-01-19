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

@section('title', 'Welcome')

@section('navbar')
    <li class="active"><a href="#">Welcome</a></li>
    <li><a href="#">Settings</a></li>
    <li><a href="#">Setup Database</a></li>
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
        <br>
        <br>
        <div class="alert alert-danger" role="alert">
            The WebPanel is licensed under the GNU AGPLv3<br>
            By using the WebPanel you agree to the license.
        </div>
        <div class="form-group">
            <label for="license">License:</label>
            <textarea class="form-control" rows="5" id="license">
The Store Webpanel V2 is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

Copyright (c) 2015-2016 "Werner Maisl"
            </textarea>
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
