<div>
    @if($loadout->owner_id == $user_id)
    <div style="float: right">
        {!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.delete',['loadoutid'=>$loadout->id])]) !!}
        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    @else
    {{--<div style="float: right">--}}
        {{--{!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.clone',['loadoutid'=>$loadout->id])]) !!}--}}
        {{--{!! Form::submit('Clone',['class' => 'btn btn-success']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    @endif
    <!-- TODO: Check if the User is already subscribed / unsubscribed -->
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
    @if($loadout->owner_id == $user_id)
        <div style="float: right">
            {!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.edit',['loadoutid'=>$loadout->id])]) !!}
            {!! Form::submit('Edit',['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}
        </div>
    @else
            <div style="float: right">
                {!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.view',['loadoutid'=>$loadout->id])]) !!}
                {!! Form::submit('View',['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
            </div>
    @endif
    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.loadouts.select',['loadoutid'=>$loadout->id])]) !!}
        {!! Form::submit('Make Primary',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

</div>