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

@extends('templates.adminlte205.webpanel.app')

@section('title', 'Versions')

@section('subtitle', 'Overview')

@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Versions</li>
    <li class="active">Overview</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Intro</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Version Overview</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route("webpanel.store.versions.update")}}">Update Plugin Versions</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @if($private_plugins)
                            <div class="callout callout-danger">
                                <h4>Private Plugins detected</h4>
                                <p>You are using private plugins. Private plugins are not supported by the updater. Therefore it will not work.</p>
                            </div>
                        @endif
                        @if($date_diff > 10)
                            <div class="callout callout-info">
                                <h4>Version Data of of Date</h4>
                                <p>The Version Data is out of date. You should click on "Update Plugin Versions" to update to check against the latest version</p>
                            </div>
                        @endif
                        This Page shows you the installed versions of the store modules on your servers.<br>
                        Every once in a while you should click on the "Update Plugin Version" button to download the latest version information.<br>
                        This is not done automatically, because it can take quite a while to download the updated version files.<br>
                        There will be a notification if it has not been updated for 10 days.<br>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @if(!$private_plugins)
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Module Name</th>
                                    <th>Module Description</th>
                                    <th>Installed Version</th>
                                    <th>Current Version</th>
                                    <th>Server ID</th>
                                    <th>Last Updated</th>
                                    <th>Update Status</th>
                                </tr>
                                @foreach($plugin_versions as $version)
                                    <tr>
                                        <td><a href="{{ route('webpanel.store.versions.show', array($version["mod_id"])) }}">{{$version["mod_id"]}}</a></td>
                                        <td>{{$version["display-name"]}}</td>
                                        <td>{{$version["description"]}}</td>
                                        <td>{{$version["mod_ver_number"]}}</td>
                                        <td>{{$version["current-version"]}}</td>
                                        <td>{{$version["server_id"]}}</td>
                                        <td>{{$version["mod_last_updated"]}}</td>
                                        @if($version["version"]["code"] == 0)
                                            <td><small class="label label-success"> Up2Date</small></td>
                                        @elseif($version["version"]["code"] >= 10 && $version["version"]["code"] <= 19)
                                            <td><small class="label label-warning"> OutOfDate</small></td>
                                        @elseif($version["version"]["code"] >= 910 && $version["version"]["code"] <= 99)
                                            <td><small class="label label-danger"> Error</small></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop