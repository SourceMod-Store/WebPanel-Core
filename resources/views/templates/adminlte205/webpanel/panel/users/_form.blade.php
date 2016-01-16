{{--Copyright (c) 2015 "Werner Maisl"--}}

{{--This file is part of the Store Webpanel V2.--}}

{{--The Store Webpanel V2 is free software: you can redistribute it and/or modify--}}
{{--it under the terms of the GNU Affero General Public License as--}}
{{--published by the Free Software Foundation, either version 3 of the--}}
{{--License, or (at your option) any later version.--}}

{{--This program is distributed in the hope that it will be useful,--}}
{{--but WITHOUT ANY WARRANTY; without even the implied warranty of--}}
{{--MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the--}}
{{--GNU Affero General Public License for more details.--}}

{{--You should have received a copy of the GNU Affero General Public License--}}
{{--along with this program. If not, see <http://www.gnu.org/licenses/>.--}}

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
                    {!! Form::label('name', 'User Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-Mail') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::text('password', null, ['class' => 'form-control']) !!} <!-- TODO: Change this to a password field -->
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
                <h3 class="box-title">User Roles</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('role_list', 'Roles') !!}
                    {!! Form::select('role_list[]', $roles, $current_roles,['id' => 'role_list','class' => 'form-control','multiple']) !!}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->

@section('footer')
    <!-- Select 2-->
    <script src="{{asset('templates/adminlte205/plugins/select2/select2.min.js')}}"></script>

    <script>
        $('#role_list').select2({
            placeholder: 'Select Roles'
        });
    </script>
@endsection