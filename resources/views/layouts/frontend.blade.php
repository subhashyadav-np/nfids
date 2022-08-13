<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{ $title . ' >> ' }} @endisset{{ config('app.name') }}</title>
    <meta name="keywords" content="{{ @$metaKey }}" />
    <meta name="author" content="HostBala" />
    <meta name="robots" content="" />
    <meta name="description" content="{{ @$metaDesc }}" />
    <meta property="og:title" content="@isset($title) {{ $title . ' >> ' }} @endisset{{ config('app.name') }}" />
    <meta property="og:description" content="{{ @$metaDesc }}" />
    <meta property="og:image" content="https://www.hostbala.com/images/og-image.png" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" href="{{asset('frontend/libs/bootstrap-4.0.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/libs/simple-ticker/jquery.simpleTicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/libs/owlcarousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{asset('frontend/css/crausel.init.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/libs/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    @yield('styles')
</head>
<body>

    <div id="SiteLoader">
        <img src="{{asset('images/loader.gif')}}" alt="">
    </div>
    
    @include('frontend.inc.header')

    @if (Route::currentRouteName() == 'homepage' || Route::currentRouteName() == 'login' || route::currentRouteName() == 'register' || route::currentRouteName() == 'password.request')
        
    @else
        <section id="breadcumb">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center text-white py-5">
                        <h1>{{@$title}}</h1>
                        <p><u><a class="text-white" href="{{route('homepage')}}">Home</a></u> > {{@$title}}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @yield('content')

    @include('frontend.inc.footer')

    <!--SCRIPTS-->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/libs/bootstrap-4.0.0/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/libs/simple-ticker/jquery.simpleTicker.js')}}"></script>
    <script src="{{ asset('frontend/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/libs/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('backend/libs/notify/notify-script.js') }}"></script>
    <script>
        
        $('document').ready(function() {
            $('#SiteLoader').css("display", "none");
            //simple ticker
            $.simpleTicker($('#sticker-item'), {
                speed: 1000,
                delay: 3000,
                easing: 'swing',
                effectType: 'roll'
            });
            // owl carousel script
            $('.carousel').owlCarousel({
                margin: 0,
                loop: true,
                autoplay: true,
                autoplayTimeOut: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false
                    }
                }
            });
            // owl carousel script
            $('.tc-crausel').owlCarousel({
                margin: 0,
                loop: true,
                autoplay: true,
                autoplayTimeOut: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false
                    }
                }
            });
        })
    </script>

    @yield('scripts')

    @include('flash')

</body>
</html>