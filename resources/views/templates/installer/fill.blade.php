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

@section('title', 'Fill Database')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li class="active"><a href="#">Fill Database</a></li>
    <li><a href="#">Migrate Data</a></li>
    <li><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="top-container">
        <p class="lead">
            This page will help you setup the database<br>
            Once you click on proceed the database will be populated.<br>
        </p>
    </div>
    {!! Form::open(['method'=>'post','route' => 'installer.fill_db.post']) !!}
    <div class="middle-container">
        <div class="alert alert-info" role="alert">
            Make sure that the <strong>.env file</strong> is filled out correctly before clicking on "Fill Database".
        </div>
        <div class="alert alert-info" role="alert">
            It could take a few minutes until the database is populated. <strong>DO NOT ABORT THE PROCESS</strong>
        </div>
        <div class="alert alert-info" role="alert">
            Make sure that the php_max_execution time is at least 120 seconds.
        </div>
    </div>
    <div class="bottom-container">
        <div class="floatCenter">Step 2 / 4</div>
        <div class="floatRight">
            {!! Form::submit("Fill Database", ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection