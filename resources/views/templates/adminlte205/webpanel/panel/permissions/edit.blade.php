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

@section('title', 'Permissions')

@section('subtitle', 'Edit')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Permissions</li>
    <li class="active">Edit</li>
@stop

@section('content')
    {!! Form::model($permission,['method' => 'PATCH','route' => ['webpanel.panel.permissions.update',$permission->id]]) !!}
    @include('templates.adminlte205.webpanel.panel.permissions._form',['LeftMenuTitle'=>'Edit Permission '.$permission->name,'SubmitButtonText' => 'Edit Permission'])
    {!! Form::close() !!}
@stop