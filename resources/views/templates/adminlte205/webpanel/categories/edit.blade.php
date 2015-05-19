@extends('templates.adminlte205.webpanel.app')

@section('title', 'Categories')

@section('subtitle', 'Edit')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categories</li>
    <li class="active">Edit</li>
@stop

@section('content')
    {!! Form::model($category,['method' => 'PATCH','route' => ['webpanel.categories.update',$category->id]]) !!}
    @include('templates.adminlte205.webpanel.categories._form',['LeftMenuTitle'=>'Edit Category '.$category->name,'SubmitButtonText' => 'Edit Category'])
    {!! Form::close() !!}
@stop