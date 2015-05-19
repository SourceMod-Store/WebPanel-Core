@section('head')
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
                <div class="form-group">
                    {!! Form::label('type', 'Type') !!}
                    {!! Form::text('type', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('loadout_slot', 'Loadout Slot') !!}
                    {!! Form::text('loadout_slot', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category ID') !!}
                    {!! Form::select('category_id', $categories, null,['id' => 'category_id','class' => 'form-control']) !!}
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-6">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Optional Settings</a></li>
                <li><a href="#tab_2" data-toggle="tab">Attrs</a></li>
                <li><a href="#tab_3" data-toggle="tab">Server Restriction</a></li>
                <!--<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="form-group">
                        {!! Form::label('priority', 'Priority') !!}
                        <div class="row margin">
                            <div class="col-sm-12">
                                {!! Form::text('priority') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('web_description', 'Web Description') !!}
                        {!! Form::text('web_description', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::checkbox('is_buyable') !!}
                        {!! Form::label('is_buyable', 'Is Buyable') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::checkbox('is_tradeable') !!}
                        {!! Form::label('is_tradeable', 'is Tradeable') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::checkbox('is_refundable') !!}
                        {!! Form::label('is_refundable', 'Is Refundable') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('expiry_time', 'Expiry Time') !!}
                        {!! Form::text('expiry_time', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('flags', 'Flags') !!}
                        {!! Form::text('flags', null, ['class' => 'form-control']) !!}
                    </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="form-group">
                        {!! Form::label('attrs', 'Attrs') !!}
                        {!! Form::textarea('attrs', null, ['class' => 'form-control']) !!} <!-- TODO: Repalce with textarea with json highlighting-->
                    </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
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
                                If you would like to restrict a category to a specific server, then you have to enable server restrictions for that category by checking the checkbox "Enable Server Restrictions".
                                <br>
                                Once you have done that, you have to enter your servers below.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::checkbox('enable_server_restriction') !!}
                        {!! Form::label('enable_server_restriction', 'Enable Server Restriction') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('server_list', 'Servers') !!}
                        {!! Form::select('server_list[]', $servers, null,['id' => 'server_list','class' => 'form-control','multiple']) !!}
                    </div>
                    <div class="form-group">

                    </div>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
        <!--
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Optional Entries</h3>
            </div>
            <div class="box-body">
            </div>
        </div>-->
    </div>
</div><!-- /.row -->

@section('footer')
    <!-- Select 2-->
    <script src="{{asset('templates/adminlte205/plugins/select2/select2.min.js')}}"></script>

    <!-- Ion Slider -->
    <script src="{{asset('templates/adminlte205/plugins/ionslider/ion.rangeSlider.min.js')}}"></script>

    <script>
        $("#priority").ionRangeSlider({
            min: 0,
            max: 20,
            type: 'single',
            step: 1,
            postfix: "",
            prettify: false,
            hasGrid: true
        });

        $('#category_id').select2({
            placeholder: 'Select a Category'
        });
        $('#server_list').select2({
            placeholder: 'Select a Category'
        });
    </script>
@endsection