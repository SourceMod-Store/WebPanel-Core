<div>
    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.useritems.buy')]) !!}
        {!! Form::submit('Buy ' . $item->id,['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

    {{--<div style="float: right">--}}
        {{--{!! Form::open(['method' => 'GET', 'url' => route('userpanel.useritems.edit',$useritem->id)]) !!}--}}
        {{--{!! Form::submit('Edit ' . $useritem->id,['class' => 'btn btn-danger']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
</div>