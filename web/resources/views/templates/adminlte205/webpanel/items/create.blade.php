@extends('templates.adminlte205.webpanel.app')

@section('title', 'Items')

@section('subtitle', 'Create')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Items</li>
    <li class="active">Create</li>
@stop

@section('content')
    {!! Form::open(['route' => 'webpanel.items.store']) !!}
        @include('templates.adminlte205.webpanel.items._form',['LeftMenuTitle'=>'Create a new Item','SubmitButtonText' => 'Create Item'])
    {!! Form::close() !!}
@stop