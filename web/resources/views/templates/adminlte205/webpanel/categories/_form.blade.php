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
                    <!--
                    {!! Form::text('priority', 0, ['class' => 'form-control']) !!}-->
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
                <div class="form-group">
                    {!! Form::checkbox('enable_server_restriction') !!}
                    {!! Form::label('enable_server_restriction', 'Enable Server Restriction') !!}
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
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                            If you would like to restrict a category to a specific server, then you have to enable server restrictions for that category by checking the checkbox "Enable Server Restrictions" on the left.
                            <br>
                            Once you have done that, you have to enter your servers below.
                            <br>
                            Btw. you can collapse this info by clicking on the title
                        </div>
                    </div>
                </div>
                {!! Form::label('server_list', 'Servers') !!}
                {!! Form::select('server_list[]', $servers, null,['id' => 'server_list','class' => 'form-control','multiple']) !!}
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