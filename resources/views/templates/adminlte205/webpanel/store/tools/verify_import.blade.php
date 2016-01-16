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

@extends('templates.adminlte205.webpanel.app')

@section('title', 'Tools')

@section('subtitle', 'Verify Import')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tools</li>
    <li class="active">Importer</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'webpanel.store.tools.do_import', 'files' => true]) !!}
            {!! Form::hidden('fileName',$fileName)!!}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Overview</h3>
                </div><!-- /.box-header -->
                <div class="box-body"> <!-- TODO: Replace these with info messages -->
                    @if($json_version == 0)
                        You are trying to import a legacy json object
                    @else
                        You are trying to import a version {{$json_version}} json object
                    @endif
                    <br>
                    You are trying to import {{$json_type}}

                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit("Proceed", ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box -->
            {!! Form::close() !!}
        </div><!-- /.col -->
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detailed Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- TODO: List the categories / items here -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop