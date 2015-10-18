@extends('templates.adminlte205.userpanel.app')

@section('title', 'Loadout')

@section('subtitle', 'View')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Loadout</li>
    <li class="active">View</li>
@stop

@section('content')
    {!! Form::model($loadout,[]) !!}
        @include('templates.adminlte205.userpanel.loadouts._form',['LeftMenuTitle'=>'View Loadout '.$loadout->name,'SubmitButtonText' => 'View Loadout','disabled' => true])
    {!! Form::close() !!}
@stop