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
    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.useritems.sell', ["item_id"=>$item->item_id])]) !!}
        {!! Form::token() !!}
        {!! Form::hidden('single_item',true) !!}
        @if ($item->is_refundable == 1)
            {!! Form::submit('Sell One',['class' => 'btn btn-warning']) !!}
        @else
            {!! Form::submit('Trash One',['class' => 'btn btn-danger']) !!}
        @endif
        {!! Form::close() !!}
    </div>

    <div style="float: right">
        {!! Form::open(['method' => 'post', 'url' => route('userpanel.useritems.sell', ["item_id"=>$item->item_id])]) !!}
        {!! Form::token() !!}
        {!! Form::hidden('single_item',false) !!}
        @if ($item->is_refundable == 1)
            {!! Form::submit('Sell All',['class' => 'btn btn-warning']) !!}
        @else
            {!! Form::submit('Trash All',['class' => 'btn btn-danger']) !!}
        @endif
        {!! Form::close() !!}
    </div>
</div>