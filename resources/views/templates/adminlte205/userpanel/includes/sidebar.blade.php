<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{URL::route('userpanel.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <!-- UserItems -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i>
                    <span>Items</span>
                    <span class="label label-primary pull-right">123</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('userpanel.useritems.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                    <li><a href="{{URL::route('userpanel.useritems.buy')}}"><i class="fa fa-circle-o"></i> Buy </a></li>
                    <!--<li><a href="{{URL::route('webpanel.dashboard')}}"><i class="fa fa-circle-o"></i> Stats</a></li>  TODO: Add named route -->
                </ul>
            </li>

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

            <!-- LoadOut Items -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Loadout Items</span>
                    <span class="label label-primary pull-right">123</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('userpanel.loadoutitems.index')}}"><i class="fa fa-circle-o"></i> View </a></li>
                    <li><a href="{{URL::route('userpanel.loadoutitems.create')}}"><i class="fa fa-circle-o"></i> Create </a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>