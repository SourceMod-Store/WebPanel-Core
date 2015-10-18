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
                    {!! Form::label('display_name', 'Display Name') !!}
                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('game', 'Game') !!}
                    {!! Form::select('game', array(''=>'','css' => 'Counter Strike: Source', 'tf2' => 'Team Fortress 2', 'csgo' => 'Counter Strike: GO'), null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('class', 'Class') !!}
                    {!! Form::select('class', array(''=>'','scout'=>'Scout','sniper'=>'Sniper'),null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('team', 'Team') !!}
                    {!! Form::select('team', array(''=>'','2' => 'T / RED', '3' => 'CT / BLUE'),null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('privacy', 'Privacy') !!}
                    {!! Form::select('privacy', array(''=>'','private' => 'Private', 'public' => 'Public'), null, ['class' => 'form-control']) !!}
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit($SubmitButtonText, ['class' => 'btn btn-primary']) !!}
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
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
            placeholder: 'Select a Server'
        });
    </script>
@endsection