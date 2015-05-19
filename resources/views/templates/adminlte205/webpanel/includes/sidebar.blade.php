<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{URL::route('temp')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li> <!-- TODO: Add named route -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i>
                    <span>Categories</span>
                    <span class="label label-primary pull-right">{{$categoryCount}}</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('webpanel.categories.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                    <li><a href="{{URL::route('webpanel.categories.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                    <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Items</span>
                    <span class="label label-primary pull-right">{{$itemCount}}</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('webpanel.items.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                    <li><a href="{{URL::route('webpanel.items.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                    <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="label label-primary pull-right">{{$userCount}}</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('webpanel.users.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                    <li><a href="{{URL::route('webpanel.users.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                    <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Loadouts</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> View </a></li> <!-- TODO: Add named route -->
                    <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Create </a></li> <!-- TODO: Add named route -->
                    <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i>
                    <span>Servers</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('webpanel.servers.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                    <li><a href="{{URL::route('webpanel.servers.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                    <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li><a href="{{URL::route('webpanel.versions.index')}}"><i class="fa fa-desktop"></i> Versions</a></li>
            <li><a href="{{URL::route('webpanel.tools.index')}}"><i class="fa fa-wrench"></i> Tools</a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>