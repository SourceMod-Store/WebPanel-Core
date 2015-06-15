<div>
    <div style="float: right">
        {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.store.users.destroy',$category->id)]) !!}
        {!! Form::submit('Remove ' . $category->id,['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div style="float: right">
        {!! Form::open(['method' => 'GET', 'url' => route('webpanel.store.users.edit',$category->id)]) !!}
        {!! Form::submit('Edit ' . $category->id,['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>