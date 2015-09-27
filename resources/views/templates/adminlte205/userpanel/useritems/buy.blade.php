@extends('templates.adminlte205.userpanel.app')

@section('title', 'UserItems')

@section('subtitle', 'Shop')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Items</li>
    <li class="active">Shop</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Items for Sale</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th style="width: 10px">Prio</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Loadout Slot</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
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
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url("userpanel/useritems/itemdata") }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'priority', name: 'priority'},
                    {data: 'display_name', name: 'display_name'},
                    {data: 'description', name: 'description'},
                    {data: 'type', name: 'type'},
                    {data: 'loadout_slot', name: 'loadout_slot'},
                    {data: 'price', name: 'price'},
                    {data: 'action', name: 'Action'},
                ]
            });
        } );
    </script>
@stop