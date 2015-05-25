@extends('templates.adminlte205.webpanel.app')

@section('title', 'Users')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Permissions</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Permissions</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($permissions as $permission)
                            <tr>
                                <td><a href="{{ route('webpanel.panel.permissions.edit', array($permission->id)) }}">{{$permission->id}}</a></td>
                                <td>{{$permission->auth}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->credits}}</td>
                                <td>
                                    <div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.panel.permissions.destroy',$permission->id)]) !!}
                                            {!! Form::submit('Remove',['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'GET', 'url' => route('webpanel.panel.permissions.edit',$permission->id)]) !!}
                                            {!! Form::submit('Edit',['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop