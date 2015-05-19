@extends('templates.adminlte205.webpanel.app')

@section('title', 'Versions')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Versions</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Versions</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Module Name</th>
                            <th>Module Description</th>
                            <th>Installed Version</th>
                            <th>Current Version</th>
                            <th>Server ID</th>
                            <th>Last Updated</th>
                        </tr>
                        @foreach($versions as $version)
                            <tr>
                                <td><a href="{{ route('webpanel.versions.show', array($version->id)) }}">{{$version->id}}</a></td>
                                <td>{{$version->mod_name}}</td>
                                <td>{{$version->mod_description}}</td>
                                <td>{{$version->mod_ver_number}}</td>
                                <td>n/a</td>
                                <td>{{$version->server_id}}</td>
                                <td>{{$version->last_updated}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
                <!--
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
                -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
@stop