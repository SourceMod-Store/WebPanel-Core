@extends('templates.adminlte205.webpanel.app')

@section('title', 'Users')

@section('subtitle', 'Overview')

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
                            <th>Auth</th>
                            <th>Name</th>
                            <th>Credits</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->auth}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->credits}}</td>
                                <td>
                                {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.users.destroy',$user->id)]) !!}
                                    {!! Form::submit('Remove') !!}
                                {!! Form::close() !!}

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