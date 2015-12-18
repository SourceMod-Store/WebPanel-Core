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
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{URL::route('userpanel.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li><a href="{{URL::route('userpanel.useritems.index')}}"><i class="fa fa-dashboard"></i> Your Items</a></li> <!-- TODO: FIX Icon -->
            <li><a href="{{URL::route('userpanel.useritems.buyoverview')}}"><i class="fa fa-dashboard"></i> Buy new Items</a></li> <!-- TODO: FIX Icon -->

            <!-- Loadouts -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Loadouts</span>
                    <span class="label label-primary pull-right">123</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('userpanel.loadouts.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                    <li><a href="{{URL::route('userpanel.loadouts.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>