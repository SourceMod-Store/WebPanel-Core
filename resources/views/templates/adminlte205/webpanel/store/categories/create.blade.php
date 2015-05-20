@extends('templates.adminlte205.webpanel.app')

@section('title', 'Categories')

@section('subtitle', 'Create')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categories</li>
    <li class="active">Create</li>
@stop

@section('content')
    {!! Form::open(['route' => 'webpanel.store.categories.store']) !!}
        @include('templates.adminlte205.webpanel.store.categories._form',['LeftMenuTitle'=>'Create a new Category','SubmitButtonText' => 'Create Category'])
    {!! Form::close() !!}
@stop