<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{URL::route('temp')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li> <!-- TODO: Add named route -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Items</span>
                    <span class="label label-primary pull-right">150</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> View </a></li> <!-- TODO: Add named route -->
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Create </a></li> <!-- TODO: Add named route -->
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open"></i>
                    <span>Categories</span>
                    <span class="label label-primary pull-right">5</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> View </a></li> <!-- TODO: Add named route -->
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Create </a></li> <!-- TODO: Add named route -->
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="label label-primary pull-right">1000</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> View </a></li> <!-- TODO: Add named route -->
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Stats</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
            <li><a href="{{URL::route('temp')}}"><i class="fa fa-desktop"></i> Versions</a></li> <!-- TODO: Add named route -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <span>Tools</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> JSON Checker </a></li> <!-- TODO: Add named route -->
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> JSON Shrinker</a></li> <!-- TODO: Add named route -->
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>