<div class="container-fluid top-header py-0" style="background: #fbf8f8">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-2">
                <div class="row align-items-center">
                    <div class="col-1">
                        <h6 class="my-0 py-0 text-primary"><b>News:</b></h6>
                    </div>
                    <div class="col-11">
                        <div class="n-sticker">
                            <div id="sticker-item" class="ticker">
                                <ul>
                                    {{--@isset($blogsData)--}}
                                        @foreach ($BlogsData as $item)
                                            <li><a class="text-primary" href="{{ route('blog_single', $item->slug) }}"> {{ Str::of($item->title)->limit(40) }} </a>
                                            </li>
                                        @endforeach
                                    {{--@endisset--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4  py-2">
                <div class="row justify-content-center">
                    <div class="col-6 text-primary"><i class="fa fa-phone-alt"></i> <span>+977 9809636934</span></div>
                    <div class="col-6 text-primary"><i class="fa fa-envelope"></i> <span>info@nfids.com</span></div>
                </div>
            </div>
            <div class="col-md-4  py-2">
                <div class="row social-media-rows">
                    <div class="col-1"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-instagram"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-twitter"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-youtube"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-linkedin"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('/images/logo.png') }}" alt="logo" height="48px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item @if (Route::currentRouteName()=='homepage' ) active @endif">
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @if (Route::currentRouteName()=='aboutpage' ||
                    Route::currentRouteName()=='projectpage' || Route::currentRouteName()=='gallerypage' ||
                    Route::currentRouteName()=='contactpage') active @endif" id="navbarDropdownMenuLink0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Organization</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink0">
                            <a class="dropdown-item @if (Route::currentRouteName() == 'aboutpage') sub-active @endif " href="{{ route('aboutpage') }}"><i class="fa fa-angle-right"></i> About Us</a>
                            <a class="dropdown-item @if (Route::currentRouteName() == 'projectpage') sub-active @endif " href="{{ route('projectpage') }}"><i class="fa fa-angle-right"></i> Projects</a>
                            <a class="dropdown-item @if (Route::currentRouteName() == 'gallerypage') sub-active @endif " href="{{ route('gallerypage') }}"><i class="fa fa-angle-right"></i> Gallery</a>
                            <a class="dropdown-item @if (Route::currentRouteName() == 'contactpage') sub-active @endif " href="{{ route('contactpage') }}"><i class="fa fa-angle-right"></i> Contact Us</a>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @if (Route::currentRouteName()=='training_consulting_single' ) active @endif" href="#"
                        id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Training & Consulting
                    </a>
                    <div class="dropdown-menu large" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($tcData as $item)
                        <a class="dropdown-item" href="{{ route('training_consulting_single', $item->slug) }}"><i class="fa fa-angle-right"></i> {{$item->title}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if (Route::currentRouteName()=='blogpage' ||
                        Route::currentRouteName()=='blog_single' ) active @endif"
                        href="{{ route('blogpage') }}">Blogs</a>
                </li>
                <li class="nav-item @if (Route::currentRouteName()=='forum.index' ||
                    Route::currentRouteName()=='forum.show' ) active @endif">
                    <a class="nav-link" href="{{ route('forum.index') }}">Dsicussion Forum</a>
                </li>
            </ul>
            <ul class="navbar-nav login-nav mr-2">
                @guest
                    <li class="nav-item @if (Route::currentRouteName()=='login' ) active @endif">
                        <a class="nav-link" href="{{ route('login') }}">Login <i class="fa fa-lock"></i> </a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a href="{{ route('admin_dashboard') }}" class="nav-link">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link"><i class="fa fa-power-off"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}"
                            onclick="return confirm('Are you sure to log out?')" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
