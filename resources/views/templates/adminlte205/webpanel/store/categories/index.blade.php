@extends('templates.adminlte205.webpanel.app')

@section('title', 'Categories')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categories</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Categories</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Priority</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Require Plugin</th>
                            <th>Web Description</th>
                            <th>Web Color</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td><a href="{{ route('webpanel.store.categories.edit', array($category->id)) }}">{{$category->id}}</a></td>
                                <td>{{$category->priority}}</td>
                                <td>{{$category->display_name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->require_plugin}}</td>
                                <td>{{$category->web_description}}</td>
                                <td>{{$category->web_color}}</td>
                                <td>
                                    <div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.store.categories.destroy',$category->id)]) !!}
                                            {!! Form::submit('Remove',['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'GET', 'url' => route('webpanel.store.categories.edit',$category->id)]) !!}
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