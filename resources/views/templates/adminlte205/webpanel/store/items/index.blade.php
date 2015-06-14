@extends('templates.adminlte205.webpanel.app')

@section('title', 'Items')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Items</li>
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
                            <!--<th>Display Name</th>
                            <th>Description</th>
                            <th>Web Description</th>
                            <th>Type</th>
                            <th>Loadout Slot</th>-->
                            <th>Price</th>
                            <th>Category ID</th>
                            <!--<th>Buyable</th>
                            <th>Tradeable</th>
                            <th>Refundable</th>
                            <th>Expiry Time</th>
                            <th>Flags</th>-->
                            <th>Actions</th>
                        </tr>
                        @foreach($items as $item)
                            <tr>
                                <td><a href="{{ route('webpanel.store.items.edit', array($item->id)) }}">{{$item->id}}</a></td>
                                <td>{{$item->priority}}</td>
                                <td>{{$item->name}}</td>
                                <!--<td>{{$item->display_name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->web_description}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->loadout_slot}}</td>-->
                                <td>{{$item->price}}</td>
                                <td>{{$item->category_id}}</td>
                                <!--<td>{{$item->is_buyable}}</td>
                                <td>{{$item->is_tradeable}}</td>
                                <td>{{$item->is_refundable}}</td>
                                <td>{{$item->expiry_time}}</td>
                                <td>{{$item->flags}}</td>-->
                                <td>
                                    <div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.store.items.destroy',$item->id)]) !!}
                                            {!! Form::submit('Remove',['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="float: right">
                                            {!! Form::open(['method' => 'GET', 'url' => route('webpanel.store.items.edit',$item->id)]) !!}
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