@extends('templates.adminlte205.userpanel.app')

@section('title', 'Loadout')

@section('subtitle', 'Create')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Loadout</li>
    <li class="active">Create</li>
@stop

@section('content')
    {!! Form::open(['route' => 'userpanel.loadouts.create']) !!}
        @include('templates.adminlte205.userpanel.loadouts._form',['LeftMenuTitle'=>'Create a new Loadout','SubmitButtonText' => 'Create Loadout','disabled' => false])
    {!! Form::close() !!}
@stop