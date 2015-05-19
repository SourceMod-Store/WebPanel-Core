@extends('templates.adminlte205.webpanel.app')

@section('title', 'Servers')

@section('subtitle', 'Create')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Servers</li>
    <li class="active">Create</li>
@stop

@section('content')
    {!! Form::open(['route' => 'webpanel.servers.store']) !!}
        @include('templates.adminlte205.webpanel.servers._form',['LeftMenuTitle'=>'Create a new Server','SubmitButtonText' => 'Create Server'])
    {!! Form::close() !!}
@stop