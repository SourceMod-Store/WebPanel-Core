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