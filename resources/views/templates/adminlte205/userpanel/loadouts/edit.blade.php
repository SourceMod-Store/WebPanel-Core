@extends('templates.adminlte205.userpanel.app')

@section('title', 'Loadout')

@section('subtitle', 'Edit')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Loadout</li>
    <li class="active">Edit</li>
@stop

@section('content')
    {!! Form::model($loadout,['method' => 'POST','route' => ['userpanel.loadouts.edit',$loadout->id]]) !!}
        @include('templates.adminlte205.userpanel.loadouts._form',
                ['LeftMenuTitle'=>'Edit Loadout '.$loadout->name,
                'edit' => true,
                'RightMenuTitle'=>'Edit Items'])
    {!! Form::close() !!}
@stop