<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                     <span>
                        <img alt="image" class="img-container" src="{{asset(\Auth::user()->profileSource())}}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="modal_window.html#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{\Auth::user()->firstName . ' '. \Auth::user()->lastName}}</strong>
                             </span> <span class="text-muted text-xs block">Menu <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="">Profile</a></li>
                        <li><a href="">Contacts</a></li>
                        <li class="divider"></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    SS+
                </div>
            </li>
            <li>
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
            </li>
                <li class="divider"></li>

            <li>
                <a href="{{ url('/events') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span></a>
            </li>
            <li>
                <a href="{{url('/notice')}}"><i class="fa fa-info-circle"></i> <span class="nav-label">Notice Board</span></a>
            </li>
            <li>
                <a href="{{ url('manager') }}"><i class="fa fa-folder-open-o"></i> <span class="nav-label">File Manager</span></a>
            </li>



            <li>
                <a href="{{ url('/profile/update') }}"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span></a>
            </li>
            <li class="special_link">
                <a href="{{ url(group) }}"><i class="fa fa-database"></i> <span class="nav-label" style="color: #ffffff">Manage Your Groups</span></a>
            </li>
        </ul>

    </div>
</nav>