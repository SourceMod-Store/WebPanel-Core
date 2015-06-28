<div>
    <div style="float: right">
        {!! Form::open(['method' => 'DELETE', 'url' => route('webpanel.store.users.destroy',$user->id)]) !!}
        {!! Form::submit('Remove' . $user->id,['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div style="float: right">
        {!! Form::open(['method' => 'GET', 'url' => route('webpanel.store.users.edit',$user->id)]) !!}
        {!! Form::submit('Edit' . $user->id,['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>