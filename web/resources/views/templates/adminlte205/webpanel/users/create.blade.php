@extends('templates.adminlte205.webpanel.app')

@section('title', 'Users')

@section('subtitle', 'Overview')

@section('content')
    {!! Form::open(['route' => 'webpanel.users.store']) !!}
        @include('templates.adminlte205.webpanel.users._form',['SubmitButtonText' => 'Create User'])
    {!! Form::close() !!}
@stop