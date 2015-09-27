<div>
    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.useritems.remove')]) !!}
        {!! Form::token() !!}
        {!! Form::hidden('item_id',$useritem->id) !!}
        {!! Form::hidden('single_item',true) !!}
        @if ($useritem->is_refundable == 1)
            {!! Form::submit('Sell One',['class' => 'btn btn-warning']) !!}
        @else
            {!! Form::submit('Trash One',['class' => 'btn btn-danger']) !!}
        @endif
        {!! Form::close() !!}
    </div>

    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.useritems.remove')]) !!}
        {!! Form::token() !!}
        {!! Form::hidden('item_id',$useritem->id) !!}
        {!! Form::hidden('single_item',false) !!}
        @if ($useritem->is_refundable == 1)
            {!! Form::submit('Sell All',['class' => 'btn btn-warning']) !!}
        @else
            {!! Form::submit('Trash All',['class' => 'btn btn-danger']) !!}
        @endif
        {!! Form::close() !!}
    </div>
</div>