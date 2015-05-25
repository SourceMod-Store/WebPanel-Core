@extends('templates.adminlte205.webpanel.app')

@section('title', 'User')

@section('subtitle', 'Edit')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
    <li class="active">Edit</li>
@stop

@section('content')
    {!! Form::model($user,['method' => 'PATCH','route' => ['webpanel.store.users.update',$user->id]]) !!}
    @include('templates.adminlte205.webpanel.store.users._form',['LeftMenuTitle'=>'Edit User '.$user->name,'SubmitButtonText' => 'Edit User'])
    {!! Form::close() !!}
@stop