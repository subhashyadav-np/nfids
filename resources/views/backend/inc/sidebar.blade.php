<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{route('admin_dashboard')}}"><img src="{{ asset('images/logo.png') }}" alt="logo" height="38px"></a>
            <a href="{{route('homepage')}}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="https://www.nifds.com"><i class="fa fa-globe"></i></a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <a href="{{route('admin_profile')}}"><img class="img-responsive img-rounded"
                    src="{{ Auth::user()->avatar == NULL ? asset('backend/images/defaults/user.jpg') : asset('storage/' .Auth::user()->avatar) }}"
                    alt="User picture"></a>
            </div>
            <div class="user-info">
                <span class="user-name">
                    <strong>{{Auth::user()->name}}</strong>
                </span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>Online</span>
                </span>
            </div>
        </div>
        <!-- sidebar-header  -->
        <div class="sidebar-search">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control search-menu" placeholder="Search...">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>General</span>
                </li>
                <li>
                    <a href="{{route('admin_dashboard')}}">
                        <i class="fa fa-tachometer-alt icon @if (Route::currentRouteName() == 'admin_dashboard') active @endif"></i>
                        <span>Dashboard</span>
                        <span class="badge badge-pill badge-warning">New</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('training_consulting.index')}}">
                        <i class="fa fa-cogs icon @if (Route::currentRouteName() == 'training_consulting.index') active @endif"></i>
                        <span>Training & Consulting</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('project.index')}}">
                        <i class="fa fa-cogs icon @if (Route::currentRouteName() == 'project.index') active @endif"></i>
                        <span>Projects</span>
                    </a>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa fa-book icon  @if (Route::currentRouteName() == 'blog.index' || Route::currentRouteName() == 'blog.create') active @endif"></i>
                        <span>Blogs</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{route('blog.index')}}">All Posts</a>
                            </li>
                            <li>
                                <a href="{{route('blog.create')}}">Create Post</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('gallery.index')}}">
                        <i class="fa fa-image icon @if (Route::currentRouteName() == 'gallery.index') active @endif"></i>
                        <span>Gallery</span>
                        <span class="badge badge-pill badge-primary">All Photos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('team.index')}}">
                        <i class="fa fa-users icon @if (Route::currentRouteName() == 'team.index') active @endif"></i>
                        <span>Teams</span>
                    </a>
                </li>
                <li class="header-menu">
                    <span>Extra</span>
                </li>
                <li>
                    <a href="{{route('mail.index')}}">
                        <i class="fa fa-envelope icon @if (Route::currentRouteName() == 'mail.index') active @endif"></i>
                        <span>Mails</span>
                        <span class="badge badge-pill badge-primary">All</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
        <a href="#">
            <i class="fa fa-bell"></i>
            <span class="badge badge-pill badge-warning notification">0</span>
        </a>
        <a href="{{route('mail.index')}}">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-pill badge-danger notification">{{$UnreadMailCount}}</span>
        </a>
        <a href="{{route('admin_profile')}}">
            <i class="fa fa-cog"></i>
            {{--<span class="badge-sonar"></span>--}}
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
<!-- sidebar-wrapper  -->