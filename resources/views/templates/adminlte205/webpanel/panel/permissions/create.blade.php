@extends('templates.adminlte205.webpanel.app')

@section('title', 'Users')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Permissions</li>
    <li class="active">Create</li>
@stop

@section('content')
    {!! Form::open(['route' => 'webpanel.panel.permissions.store']) !!}
        @include('templates.adminlte205.webpanel.panel.permissions.._form',['LeftMenuTitle'=>'Create a new Permission','SubmitButtonText' => 'Create Permissions'])
    {!! Form::close() !!}
@stop