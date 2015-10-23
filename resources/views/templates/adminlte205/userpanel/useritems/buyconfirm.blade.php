@extends('templates.adminlte205.userpanel.app')

@section('title', 'UserItems')

@section('subtitle', 'Confirm Purchase')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Items</li>
    <li class="active">Confirm Purchase</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Confirm the Item Purchase</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tr>
                            <th>Attribute</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>Item Name</td>
                            <td>{{$item->display_name}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            @if($item->web_description != "" || $item->web_description != NULL)
                                <td>{{$item->web_escription}}</td>
                            @else
                                <td>{{$item->description}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{$item->type}}</td>
                        </tr>
                        <tr>
                            <td>Loadout Slot</td>
                            <td>{{$item->loadout_slot}}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{$item->price}}</td>
                        </tr>
                        <tr>
                            <td>Tags</td>
                            <td>
                                @if($item->is_tradeable == 1) <span class="badge bg-green">tradeable</span> @else <span class="badge bg-red">not tradeable</span> @endif
                                @if($item->is_refundable == 1) <span class="badge bg-green">refundable</span> @else <span class="badge bg-red">not refundable</span> @endif
                                @if($item->enable_server_restriction == 0) <span class="badge bg-green">unrestricted</span> @else <span class="badge bg-red">restricted</span> @endif
                            </td>
                        </tr>
                        <!-- TODO: Add a column that shows if a user owns that item-->
                        </tr>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::open(['method' => 'post', 'url' => route('userpanel.useritems.buyproc', ["item_id" => $item->id])]) !!}
                    {!! Form::submit('Buy',['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('footer')
    {{--<!-- DataTables CSS -->--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('templates/adminlte205/dist/css/jquery.dataTables.min.css')}}">--}}
    {{--<!-- DataTables -->--}}
    {{--<script type="text/javascript" charset="utf8" src="{{asset('templates/adminlte205/dist/js/jquery.dataTables.min.js')}}"></script>--}}

    {{--<script>--}}
        {{--$(document).ready( function () {--}}
            {{--$('#table').DataTable({--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--ajax: '{{ route("userpanel.useritems.itemdata") }}',--}}
                {{--columns: [--}}
                    {{--{data: 'id', name: 'id'},--}}
                    {{--{data: 'priority', name: 'priority'},--}}
                    {{--{data: 'display_name', name: 'display_name'},--}}
                    {{--{data: 'description', name: 'description'},--}}
                    {{--{data: 'category.display_name', name: 'category', orderable: false, searchable: false},--}}
                    {{--{data: 'loadout_slot', name: 'loadout_slot'},--}}
                    {{--{data: 'price', name: 'price'},--}}
                    {{--{data: 'action', name: 'Action', orderable: false, searchable: false},--}}
                {{--]--}}
            {{--});--}}
        {{--} );--}}
    {{--</script>--}}
@stop