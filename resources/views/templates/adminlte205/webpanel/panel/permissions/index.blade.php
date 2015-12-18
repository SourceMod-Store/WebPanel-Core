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

@section('title', 'Users')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Permissions</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Permissions</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($permissions as $permission)
                            <tr>
                                <td><a href="{{ route('webpanel.panel.permissions.edit', array($permission->id)) }}">{{$permission->id}}</a></td>
                                <td>{{$permission->auth}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->credits}}</td>
                                <td>
                                    <div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.panel.permissions.destroy',$permission->id)]) !!}
                                            {!! Form::submit('Remove',['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'GET', 'url' => route('webpanel.panel.permissions.edit',$permission->id)]) !!}
                                            {!! Form::submit('Edit',['class' => 'btn btn-warning']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop