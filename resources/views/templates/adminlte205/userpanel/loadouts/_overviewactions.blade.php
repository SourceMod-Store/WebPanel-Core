{{--Copyright (c) 2015 "Werner Maisl"--}}

{{--This file is part of the Store Webpanel V2.--}}

{{--The Store Webpanel V2 is free software: you can redistribute it and/or modify--}}
{{--it under the terms of the GNU Affero General Public License as--}}
{{--published by the Free Software Foundation, either version 3 of the--}}
{{--License, or (at your option) any later version.--}}

{{--This program is distributed in the hope that it will be useful,--}}
{{--but WITHOUT ANY WARRANTY; without even the implied warranty of--}}
{{--MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the--}}
{{--GNU Affero General Public License for more details.--}}

{{--You should have received a copy of the GNU Affero General Public License--}}
{{--along with this program. If not, see <http://www.gnu.org/licenses/>.--}}
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
    {{--<div style="float: right">--}}
        {{--{!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.unsubscribe',['loadoutid'=>$loadout->id])]) !!}--}}
        {{--{!! Form::submit('Un-Subscribe',['class' => 'btn btn-warning']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--<div style="float: right">--}}
        {{--{!! Form::open(['method' => 'get', 'url' => route('userpanel.loadouts.subscribe',['loadoutid'=>$loadout->id])]) !!}--}}
        {{--{!! Form::submit('Subscribe',['class' => 'btn btn-success']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
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
        {!! Form::submit('Equip loadout',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>

</div>