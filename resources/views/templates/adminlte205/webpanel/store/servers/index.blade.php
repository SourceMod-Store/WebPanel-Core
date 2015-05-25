@extends('templates.adminlte205.webpanel.app')

@section('title', 'Users')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Users</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>IP</th>
                            <th>Port</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($servers as $server)
                            <tr>
                                <td><a href="{{ route('webpanel.store.servers.edit', array($server->id)) }}">{{$server->id}}</a></td>
                                <td>{{$server->name}}</td>
                                <td>{{$server->display_name}}</td>
                                <td>{{$server->ip}}</td>
                                <td>{{$server->port}}</td>
                                <td>
                                    <div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.store.servers.destroy',$server->id)]) !!}
                                            {!! Form::submit('Remove',['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'GET', 'url' => route('webpanel.store.servers.edit',$server->id)]) !!}
                                            {!! Form::submit('Edit',['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
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