<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo"><b>User</b>Panel</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                {{--<li class="dropdown messages-menu">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-envelope-o"></i>--}}
                        {{--<span class="label label-success">4</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">You have 4 messages</li><!-- TODO: Implement a Info Message feature-->--}}
                        {{--<li>--}}
                            {{--<!-- inner menu: contains the actual data -->--}}
                            {{--<ul class="menu">--}}
                                {{--<li><!-- start message -->--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{asset('templates/adminlte205/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Support Team--}}
                                            {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li><!-- end message -->--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{asset('templates/adminlte205/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--AdminLTE Design Team--}}
                                            {{--<small><i class="fa fa-clock-o"></i> 2 hours</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{asset('templates/adminlte205/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="user image"/>--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Developers--}}
                                            {{--<small><i class="fa fa-clock-o"></i> Today</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{asset('templates/adminlte205/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Sales Department--}}
                                            {{--<small><i class="fa fa-clock-o"></i> Yesterday</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="#">--}}
                                        {{--<div class="pull-left">--}}
                                            {{--<img src="{{asset('templates/adminlte205/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="user image"/>--}}
                                        {{--</div>--}}
                                        {{--<h4>--}}
                                            {{--Reviewers--}}
                                            {{--<small><i class="fa fa-clock-o"></i> 2 days</small>--}}
                                        {{--</h4>--}}
                                        {{--<p>Why not buy a new awesome theme?</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="footer"><a href="#">See All Messages</a></li><!-- TODO: Link to a proper messages Page-->--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{$credits}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">User Status</li>
                        <li>
                            <!-- inner menu: contains the actual data TODO: Add proper Icons-->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> You have {{$credits}} Credits
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> You have {{$owned_item_count}} Items
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> You own {{$owned_loadout_count}} Loadouts
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> You are subscribed to {{$subscribed_loadout_count}} Loadouts
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        @if($equipped_loadout_name != NULL)
                                        <i class="fa fa-users text-yellow"></i> You have selected the loadout {{$equipped_loadout_name}}
                                        @else
                                        <i class="fa fa-users text-yellow"></i> You have not equipped a loadout
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="{{URL::route('userpanel.dashboard')}}">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">5</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">5 Most Recent Purchases</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach($latest_items as $item)
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            {{$item->name}}
                                            <!--<small class="pull-right">20%</small>-->
                                        </h3>
                                    </a>
                                </li><!-- end task item -->
                                 @endforeach
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{{ URL::route("userpanel.useritems.index") }}">View all Items</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::route("userpanel.steamimage.current") }}" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">{{$username}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{URL::route("userpanel.steamimage.current") }}" class="img-circle" alt="User Image" />
                            <p>
                                {{$username}}
                                <small>Member since quite some time</small><!-- FIXME: Add the actual date here-->
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body"><!-- TODO: Add some meaningfull links here-->
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a><!-- TODO: Add a actual profile page-->
                            </div>
                            <div class="pull-right">
                                <a href="{{URL::route('userpanel.auth.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>