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

@section('title', 'Servers')

@section('subtitle', 'Create')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Servers</li>
    <li class="active">Create</li>
@stop

@section('content')
    {!! Form::open(['route' => 'webpanel.store.servers.store']) !!}
        @include('templates.adminlte205.webpanel.store.servers._form',['LeftMenuTitle'=>'Create a new Server','SubmitButtonText' => 'Create Server'])
    {!! Form::close() !!}
@stop