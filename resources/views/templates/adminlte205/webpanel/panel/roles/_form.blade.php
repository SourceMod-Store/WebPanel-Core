@section('head')
    <!-- Select 2-->
    <link href="{{asset('templates/adminlte205/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$LeftMenuTitle}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('display_name', 'Display Name') !!}
                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="box-footer">
                    {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </div><!-- /.col -->
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permissions</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                {!! Form::label('permission_list', 'Permissions') !!}
                {!! Form::select('permission_list[]', $permissions, $current_permissions,['id' => 'permission_list','class' => 'form-control','multiple']) !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
@section('footer')
    <!-- Select 2-->
    <script src="{{asset('templates/adminlte205/plugins/select2/select2.min.js')}}"></script>

    <script>
        $('#permission_list').select2({
            placeholder: 'Select Permissions'
        });
    </script>
@endsection