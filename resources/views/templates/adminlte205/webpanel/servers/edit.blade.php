@extends('templates.adminlte205.webpanel.app')

@section('title', 'Servers')

@section('subtitle', 'Edit')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Servers</li>
    <li class="active">Edit</li>
@stop

@section('content')
    {!! Form::model($server,['method' => 'PATCH','route' => ['webpanel.servers.update',$server->id]]) !!}
    @include('templates.adminlte205.webpanel.servers._form',['LeftMenuTitle'=>'Edit Server '.$server->name,'SubmitButtonText' => 'Edit Server'])
    {!! Form::close() !!}
@stop