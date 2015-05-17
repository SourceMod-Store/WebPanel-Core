@extends('templates.adminlte205.webpanel.app')

@section('title', 'Users')

@section('subtitle', 'Overview')

@section('content')
    {!! Form::model($user,['method' => 'PATCH','route' => ['webpanel.users.update',$user->id]]) !!}
    @include('templates.adminlte205.webpanel.users._form',['SubmitButtonText' => 'Edit User'])
    {!! Form::close() !!}
@stop