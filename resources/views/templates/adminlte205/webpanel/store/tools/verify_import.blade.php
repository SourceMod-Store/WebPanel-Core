@extends('templates.adminlte205.webpanel.app')

@section('title', 'Tools')

@section('subtitle', 'Verify Import')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tools</li>
    <li class="active">Importer</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'webpanel.store.tools.do_import', 'files' => true]) !!}
            {!! Form::hidden('fileName',$fileName)!!}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Overview</h3>
                </div><!-- /.box-header -->
                <div class="box-body"> <!-- TODO: Replace these with info messages -->
                    @if($json_version == 0)
                        You are trying to import a legacy json object
                    @else
                        You are trying to import a version {{$json_version}} json object
                    @endif
                    <br>
                    You are trying to import {{$json_type}}

                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit("Proceed", ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box -->
            {!! Form::close() !!}
        </div><!-- /.col -->
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detailed Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- TODO: List the categories / items here -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop