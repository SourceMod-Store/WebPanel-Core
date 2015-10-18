<div>
    <div style="float: right">
        {!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.delete',['loadoutid'=>$loadout->id])]) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    <div style="float: right">
        {!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.clone',['loadoutid'=>$loadout->id])]) !!}
        {!! Form::submit('Clone',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

    <div style="float: right">
        {!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.unsubscribe',['loadoutid'=>$loadout->id])]) !!}
        {!! Form::submit('Un-Subscribe',['class' => 'btn btn-warning']) !!}
        {!! Form::close() !!}
    </div>
    <div style="float: right">
        {!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.subscribe',['loadoutid'=>$loadout->id])]) !!}
        {!! Form::submit('Subscribe',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>