@extends('templates.adminlte205.webpanel.app')

@section('title', 'Items')

@section('subtitle', 'Edit')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Items</li>
    <li class="active">Edit</li>
@stop

@section('content')
    {!! Form::model($item,['method' => 'PATCH','route' => ['webpanel.store.items.update',$item->id]]) !!}
        @include('templates.adminlte205.webpanel.store.items._form',['LeftMenuTitle'=>'Edit Item '.$item->name,'SubmitButtonText' => 'Edit Item'])
    {!! Form::close() !!}
@stop