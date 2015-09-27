<div>
    @if ($useritem->is_refundable == 1)
        <div style="float: right">
            {!! Form::open(['method' => 'DELETE', 'url' => route('userpanel.useritems.sell',$useritem->id)]) !!}
            {!! Form::submit('Sell ' . $useritem->id,['class' => 'btn btn-warning']) !!}
            {!! Form::close() !!}
        </div>
    @else
        <div style="float: right">
            {!! Form::open(['method' => 'DELETE', 'url' => route('userpanel.useritems.trash',$useritem->id)]) !!}
            {!! Form::submit('Trash ' . $useritem->id,['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    @endif
    {{--<div style="float: right">--}}
        {{--{!! Form::open(['method' => 'GET', 'url' => route('userpanel.useritems.edit',$useritem->id)]) !!}--}}
        {{--{!! Form::submit('Edit ' . $useritem->id,['class' => 'btn btn-danger']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
</div>