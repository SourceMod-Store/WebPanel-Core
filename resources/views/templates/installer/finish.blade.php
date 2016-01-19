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

@extends('templates.installer.app')

@section('title', 'Finish')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li><a href="#">Settings</a></li>
    <li><a href="#">Setup Database</a></li>
    <li class="active"><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="alert alert-success" role="alert">
        <strong>Setup Complete</strong><br>
        The Setup has been completed<br>
        <a href="{{ url('/webpanel') }}">Click here</a> to log into the webpanel with the admin credentials (admin@admin.com / password)
    </div>
@endsection
