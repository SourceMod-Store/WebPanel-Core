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
    <!-- Bootstrap Color Picker -->
    <link href="{{asset('templates/adminlte205/plugins/colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet"/>

    <!-- Select 2-->
    <link href="{{asset('templates/adminlte205/plugins/select2/select2.min.css')}}" rel="stylesheet" />

    <!-- Ion Slider -->
    <link href="{{asset('templates/adminlte205/plugins/ionslider/ion.rangeSlider.css')}}" rel="stylesheet" />
    <!-- Ion Slider Nice -->
    <link href="{{asset('templates/adminlte205/plugins/ionslider/ion.rangeSlider.skinNice.css')}}" rel="stylesheet" />
@endsection

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$LeftMenuTitle}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('priority', 'Priority') !!}
                    <div class="row margin">
                        <div class="col-sm-12">
                            {!! Form::text('priority') !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('display_name', 'Display Name') !!}
                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('require_plugin', 'Require Plugin') !!}
                    {!! Form::text('require_plugin', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('web_description', 'Web Description') !!}
                    {!! Form::text('web_description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('web_color', 'Web Color') !!}
                    {!! Form::text('web_color', null, ['class' => 'form-control my-colorpicker1']) !!}
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Server Restrictions</h3>
            </div>
            <div class="box-body">
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Setting up Server Restrictions
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="box-body">
                            If you would like to restrict a category to a specific server, then you have to enable server restrictions for that category by checking the checkbox "Enable Server Restrictions"
                            <br>
                            Once you have done that, you have to enter your servers below.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::hidden('enable_server_restriction',0) !!}
                    {!! Form::checkbox('enable_server_restriction') !!}
                    {!! Form::label('enable_server_restriction', 'Enable Server Restriction') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('server_list', 'Servers') !!}
                    {!! Form::select('server_list[]', $servers, $current_servers,['id' => 'server_list','class' => 'form-control','multiple']) !!}
                </div>
            </div>
        </div>
    </div>
</div><!-- /.row -->

@section('footer')
    <!-- Bootstrap Color Picker -->
    <script src="{{asset('templates/adminlte205/plugins/colorpicker/bootstrap-colorpicker.min.js')}}" type="text/javascript"></script>

    <!-- Select 2-->
    <script src="{{asset('templates/adminlte205/plugins/select2/select2.min.js')}}"></script>

    <!-- Ion Slider -->
    <script src="{{asset('templates/adminlte205/plugins/ionslider/ion.rangeSlider.min.js')}}"></script>

    <script>
        $('#server_list').select2({
            placeholder: 'Select a Server'
        });
        $('#web_color').colorpicker();

        $("#priority").ionRangeSlider({
            min: 0,
            max: 20,
            type: 'single',
            step: 1,
            postfix: "",
            prettify: false,
            hasGrid: true
        });
    </script>
@endsection