@extends('templates.adminlte205.webpanel.app')

@section('title', 'Roles')

@section('subtitle', 'Edit')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Roles</li>
    <li class="active">Edit</li>
@stop

@section('content')
    {!! Form::model($role,['method' => 'PATCH','route' => ['webpanel.panel.roles.update',$role->id]]) !!}
    @include('templates.adminlte205.webpanel.panel.roles._form',['LeftMenuTitle'=>'Edit Role '.$role->display_name,'SubmitButtonText' => 'Edit Role'])
    {!! Form::close() !!}
@stop