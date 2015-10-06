<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{URL::route('userpanel.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li><a href="{{URL::route('userpanel.useritems.index')}}"><i class="fa fa-dashboard"></i> Your Items</a></li> <!-- TODO: FIX Icon -->
            <li><a href="{{URL::route('userpanel.useritems.buy')}}"><i class="fa fa-dashboard"></i> Buy new Items</a></li> <!-- TODO: FIX Icon -->

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