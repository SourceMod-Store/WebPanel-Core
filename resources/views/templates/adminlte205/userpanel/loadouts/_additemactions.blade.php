<div>
    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.loadouts.items.add',['loadout'=>$loadout_id,'item_id'=>$item->id])]) !!}
        {!! Form::submit('Add Item to Loadout',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>