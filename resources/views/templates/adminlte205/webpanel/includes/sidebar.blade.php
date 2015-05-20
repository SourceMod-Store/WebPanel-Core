<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <!-- Store -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i> <span>Store</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <!-- Categories-->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i>
                            <span>Categories</span>
                            <span class="label label-primary pull-right">{{$storeCategoryCount}}</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::route('webpanel.store.categories.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{URL::route('webpanel.store.categories.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                            <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                        </ul>
                    </li>

                    <!-- Items -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Items</span>
                            <span class="label label-primary pull-right">{{$storeItemCount}}</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::route('webpanel.store.items.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{URL::route('webpanel.store.items.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                            <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                        </ul>
                    </li>

                    <!-- Users -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                            <span class="label label-primary pull-right">{{$storeUserCount}}</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::route('webpanel.store.users.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{URL::route('webpanel.store.users.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                            <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                        </ul>
                    </li>

                    <!-- Loadouts -->
                    <!--<li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Loadouts</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> View </a></li>  TODO: Add named route
                                <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Create </a></li>  TODO: Add named route
                                <li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route
                            </ul>
                        </li>-->

                    <!-- Servers -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-sitemap"></i>
                            <span>Servers</span>
                            <span class="label label-primary pull-right">{{$storeServerCount}}</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::route('webpanel.store.servers.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{URL::route('webpanel.store.servers.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                            <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                        </ul>
                    </li>

                    <!-- Versions-->
                    <li><a href="{{URL::route('webpanel.store.versions.index')}}"><i class="fa fa-desktop"></i> Versions</a></li>

                    <!-- Tools -->
                    <li><a href="{{URL::route('webpanel.store.tools.index')}}"><i class="fa fa-wrench"></i> Tools</a></li>

                </ul>
            </li>

            <!-- WebPanel -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>WebPanel</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <!-- Permissions -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Permissions</span>
                            <span class="label label-primary pull-right">0</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::route('webpanel.panel.permissions.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{URL::route('webpanel.panel.permissions.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                            <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                        </ul>
                    </li>

                    <!-- Roles -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i>
                            <span>Roles</span>
                            <span class="label label-primary pull-right">0</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::route('webpanel.panel.roles.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{URL::route('webpanel.panel.roles.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                            <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                        </ul>
                    </li>

                    <!-- Users -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Users</span>
                            <span class="label label-primary pull-right">0</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::route('webpanel.panel.users.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                            <li><a href="{{URL::route('webpanel.panel.users.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                            <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                        </ul>
                    </li>
                </ul>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>