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

@section('title', 'Migrate Data')

@section('navbar')
    <li><a href="#">Welcome</a></li>
    <li><a href="#">Fill Database</a></li>
    <li class="active"><a href="#">Migrate Data</a></li>
    <li><a href="#">Finish</a></li>
@endsection

@section('body')
    <div class="top-container">
        <p class="lead">
            This page will help you migrate your current store installation to the store 2.0 installation.<br>
            Select your current store Plugin
        </p>
    </div>
    {!! Form::open(['method'=>'post','route' => 'installer.migrate.post']) !!}
    <div class="middle-container">
        <div class="alert alert-info" role="alert">
            <strong>Old Store Plugin:</strong> Select the store plugin the data should be migrated from
        </div>
        <div class="radio">
            <label><input type="radio" name="store" value="new">New Install</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="store" value="store12">Store 1.2</label>
        </div>
        <div class="radio disabled">
            <label><input type="radio" name="store" value="zeph" disabled>Zephs Store</label>
        </div>

        <div class="alert alert-info" role="alert">
            <strong>Store 1.2 Settings:</strong> You have to fill out this information if you want to migrate data from store 1.2<br>
            To be able to migrate the data, the old and the new store database need to be on the same server and the store database user entered in the .env file must be able to access both dbs.
        </div>

        <div class="form-group">
            {!! Form::label('store12_old_store_db', 'Old Store Database Name') !!}
            {!! Form::text('store12_old_store_db', "old_store", ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('store12_new_store_db', 'New Store Database Name') !!}
            {!! Form::text('store12_new_store_db', "store", ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('store12_new_store_prefix', 'New Store Database Prefix') !!}
            {!! Form::text('store12_new_store_prefix', "store_", ['class' => 'form-control']) !!}
        </div>


    </div>
    <div class="bottom-container">
        <div class="floatCenter">Step 3 / 4</div>
        <div class="floatRight">
            {!! Form::submit("Migrate the Data", ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
