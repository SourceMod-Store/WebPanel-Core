@extends('templates.adminlte205.webpanel.app')

@section('title', 'Users')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
    <li class="active">Create</li>
@stop

@section('content')
    {!! Form::open(['route' => 'webpanel.panel.permissions.store']) !!}
        @include('templates.adminlte205.webpanel.panel.permissions.._form',['LeftMenuTitle'=>'Create a new User','SubmitButtonText' => 'Create User'])
    {!! Form::close() !!}
@stop