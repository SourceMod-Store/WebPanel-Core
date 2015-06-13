@extends('templates.adminlte205.webpanel.app')

@section('title', 'Tools')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tools</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'webpanel.store.tools.import', 'files' => true]) !!}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Import</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    JSON Importer
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="box-body">
                                This is the JSON Importer
                                <br>
                                It allows you to import JSON Files from Store Modules
                            </div>
                        </div>
                    </div>
                    <div class="formgroup">
                        {!! Form::label('import', 'Import') !!}
                        {!! Form::file('import', ['class' => 'form-control', 'accept' => '.json,.zip']) !!}
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit("Import", ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box -->
            {!! Form::close() !!}
        </div><!-- /.col -->
        <div class="col-md-6">
            {!! Form::open(['route' => 'webpanel.store.tools.export']) !!}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Export</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    JSON Exporter
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                                This is the JSON Exporter
                                <br>
                                It allows you to export JSON Files that can be distributed with store modules
                                <br>
                                Enter the value of the require_plugin column of the categories you would like to export in the Requre Pluign textbox
                            </div>
                        </div>
                    </div>
                    {!! Form::label('require_plugin', 'Require Plugin') !!}
                    {!! Form::text('require_plugin', null, ['class' => 'form-control']) !!}
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit("Export", ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box -->
            {!! Form::close() !!}
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'webpanel.store.tools.json_shrinker']) !!}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">JSON Shrinker</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    JSON Shrinker
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="box-body">
                                The JSON Shrinker allows you to shrink a json object in the attrs field of a item / category
                                <br>
                                This is useful when you have huge attr sizes
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit("Shrink JSON", ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box -->
            {!! Form::close() !!}
        </div><!-- /.col -->
        <div class="col-md-6">
            {!! Form::open(['route' => 'webpanel.store.tools.json_checker']) !!}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">JSON Checker</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    JSON Checker
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="box-body">
                                This tool verifies the JSON Object in the attrs field
                                <br>
                                This is useful when you get an error message in the store plugin that says that a attrs field is invalid and you dont know which one it is
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit("Check JSON", ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box -->
            {!! Form::close() !!}
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop