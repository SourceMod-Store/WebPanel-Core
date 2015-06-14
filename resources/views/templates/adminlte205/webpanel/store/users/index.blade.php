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
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Auth</th>
                                <th>Name</th>
                                <th>Credits</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="{{ route('webpanel.store.users.edit', array($user->id)) }}">{{$user->id}}</a></td>
                                    <td>{{$user->auth}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->credits}}</td>
                                    <td>
                                        <div>
                                            <div style="float: right">
                                                {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.store.users.destroy',$user->id)]) !!}
                                                {!! Form::submit('Remove',['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <div style="float: right">
                                                {!! Form::open(['method' => 'GET', 'url' => route('webpanel.store.users.edit',$user->id)]) !!}
                                                {!! Form::submit('Edit',['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('footer')
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('templates/adminlte205/dist/css/jquery.dataTables.min.css')}}">
    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="{{asset('templates/adminlte205/dist/js/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@stop