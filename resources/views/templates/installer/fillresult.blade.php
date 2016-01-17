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

@section('title', 'Fill Database Result')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li class="active"><a href="#">Fill Database</a></li>
    <li><a href="#">Migrate Data</a></li>
    <li><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="top-container">
        <p class="lead">
            The Database Migrations have been executed<br>
            Check the log for errors and click on proceed to get to the data migration.<br>
        </p>
    </div>
    <div class="middle-container">
        <div class="alert alert-info" role="alert">
            The Database has been migrated. The output of the migrator can be found below.
        </div>
        <div class="alert alert-info" role="alert">
            If there are error messages: Fix them and reload this page.
        </div>
        <div class="form-group">
            <label for="comment">Log:</label>
            <textarea class="form-control" rows="5" id="comment">{{$output}}</textarea>
        </div>
    </div>
    <div class="bottom-container">
        <div class="floatCenter">Step 2 / 4</div>
        <div class="floatRight">
            {!! Form::open(['method'=>'get','route' => 'installer.finish.show']) !!}
            {!! Form::submit("Proceed", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection