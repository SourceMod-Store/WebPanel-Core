@extends('templates.adminlte205.userpanel.app')

@section('title', 'Loadout')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Loadout</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Loadouts</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                        <tr>
                            <th>Display Name</th>
                            <th>Game</th>
                            <th>Class</th>
                            <th>Team</th>
                            <th>Privacy</th>
                            <th>Owner</th>
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
                ajax: '{{ route("userpanel.loadouts.itemdata",["loadout" => $loadout->id]) }}',
                columns: [
                    {data: 'display_name', name: 'display_name'},
                    {data: 'game', name: 'game'},
                    {data: 'class', name: 'class'},
                    {data: 'team', name: 'team'},
                    {data: 'privacy', name: 'privacy'},
                    {data: 'owner.name', name: 'owner'},
                    {data: 'action', name: 'Action', orderable: false, searchable: false}
                ]
            });
        } );
    </script>
@stop