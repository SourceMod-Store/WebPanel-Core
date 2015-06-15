<div>
    <div style="float: right">
        {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.store.items.destroy',$item->id)]) !!}
        {!! Form::submit('Remove',['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div style="float: right">
        {!! Form::open(['method' => 'GET', 'url' => route('webpanel.store.items.edit',$item->id)]) !!}
        {!! Form::submit('Edit',['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>