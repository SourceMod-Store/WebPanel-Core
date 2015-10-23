@section('head')
    {{--<!-- Select 2-->--}}
    {{--<link href="{{asset('templates/adminlte205/plugins/select2/select2.min.css')}}" rel="stylesheet" />--}}

    {{--<!-- Ion Slider -->--}}
    {{--<link href="{{asset('templates/adminlte205/plugins/ionslider/ion.rangeSlider.css')}}" rel="stylesheet" />--}}
    {{--<!-- Ion Slider Nice -->--}}
    {{--<link href="{{asset('templates/adminlte205/plugins/ionslider/ion.rangeSlider.skinNice.css')}}" rel="stylesheet" />--}}
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
                    @if ($edit)
                        {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::text('display_name', null, ['class' => 'form-control','disabled']) !!}
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('game', 'Game') !!}
                    @if ($edit)
                        {!! Form::select('game', array(''=>'','css' => 'Counter Strike: Source', 'tf2' => 'Team Fortress 2', 'csgo' => 'Counter Strike: GO'), null,['class' => 'form-control']) !!}
                    @else
                        {!! Form::select('game', array(''=>'','css' => 'Counter Strike: Source', 'tf2' => 'Team Fortress 2', 'csgo' => 'Counter Strike: GO'), null,['class' => 'form-control','disabled']) !!}
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('class', 'Class') !!}
                    @if ($edit)
                        {!! Form::select('class', array(''=>'',
                                                        'scout'=>'Scout',
                                                        'sniper'=>'Sniper',
                                                        'soldier'=>'Soldier',
                                                        'demoman'=>'Demoman',
                                                        'medic'=>'Medic',
                                                        'heavy'=>'Heavy',
                                                        'pyro'=>'Pyro',
                                                        'spy'=>'Spy',
                                                        'engineer'=>'Engineer'
                        ),null, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::select('class', array(''=>'',
                                'scout'=>'Scout',
                                'sniper'=>'Sniper',
                                'soldier'=>'Soldier',
                                'demoman'=>'Demoman',
                                'medic'=>'Medic',
                                'heavy'=>'Heavy',
                                'pyro'=>'Pyro',
                                'spy'=>'Spy',
                                'engineer'=>'Engineer'
                        ),null, ['class' => 'form-control', 'disabled']) !!}
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('team', 'Team') !!}
                    @if ($edit)
                        {!! Form::select('team', array(''=>'','2' => 'T / RED', '3' => 'CT / BLUE'),null, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::select('team', array(''=>'','2' => 'T / RED', '3' => 'CT / BLUE'),null, ['class' => 'form-control','disabled']) !!}
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('privacy', 'Privacy') !!}
                    @if ($edit)
                        {!! Form::select('privacy', array(''=>'','private' => 'Private', 'public' => 'Public'), null, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::select('privacy', array(''=>'','private' => 'Private', 'public' => 'Public'), null, ['class' => 'form-control','disabled']) !!}
                    @endif
                </div>
            </div><!-- /.box-body -->
            @if ($edit)
            <div class="box-footer">
                {!! Form::hidden('owner_id', $user_id) !!}
                {!! Form::submit("Save Changes", ['class' => 'btn btn-primary']) !!}
            </div>
            @elseif(!$edit && $loadout->owner_id == $user_id)
                <div class="box-footer">
                    <a href="{{route("userpanel.loadouts.edit",["loadout"=>$loadout->id])}}"><span class="btn btn-info">Switch to Edit Mode</span></a>
                </div>
            @endif
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$RightMenuTitle}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Loadout Slot</th>
                        <th style="width: 50px">Action</th>
                    </tr>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item["id"]}}.</td>
                            <td>{{$item["name"]}}</td>
                            <td>{{$item["type"]}}</td>
                            <td>{{$item["loadout_slot"]}}</td>
                            <td>
                                <a href="{{route("userpanel.useritems.buyconf",["item_id"=> $item["id"]])}}"><span class="badge bg-green">Buy</span></a>
                                @if($edit)<a href="{{route("userpanel.loadouts.items.remove",["loadout"=>$loadout->id, "item_id"=> $item["id"]])}}"<span class="badge bg-red">Remove</span></a>@endif()
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div><!-- /.box-body -->
            @if($edit)
                <div class="box-footer">
                    <a href="{{route("userpanel.loadouts.items",["loadout"=>$loadout->id])}}"><span class="btn btn-success">Add new Items</span></a>
                </div>
            @endif
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

@section('footer')
    {{--<!-- Select 2-->--}}
    {{--<script src="{{asset('templates/adminlte205/plugins/select2/select2.min.js')}}"></script>--}}

    {{--<!-- Ion Slider -->--}}
    {{--<script src="{{asset('templates/adminlte205/plugins/ionslider/ion.rangeSlider.min.js')}}"></script>--}}

    {{--<script>--}}
        {{--$("#priority").ionRangeSlider({--}}
            {{--min: 0,--}}
            {{--max: 20,--}}
            {{--type: 'single',--}}
            {{--step: 1,--}}
            {{--postfix: "",--}}
            {{--prettify: false,--}}
            {{--hasGrid: true--}}
        {{--});--}}

        {{--$('#category_id').select2({--}}
            {{--placeholder: 'Select a Category'--}}
        {{--});--}}
        {{--$('#server_list').select2({--}}
            {{--placeholder: 'Select a Server'--}}
        {{--});--}}
    {{--</script>--}}
@endsection