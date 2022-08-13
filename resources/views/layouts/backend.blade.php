<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{ $title . ' >> ' }} @endisset{{ config('app.name') }}</title>
        <meta name="author" content="HostBala" />

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

        <!--CSS-->
        <link rel="stylesheet" href="{{ asset('backend/libs/bootstrap-4.0.0/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">
        <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">

        <!-- DataTable css -->
        <link href="{{ asset('backend/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        
        @yield('styles')
    </head>

    <body>
        <div class="page-wrapper chiller-theme toggled">

            @include('backend.inc.sidebar')
            
            <main class="page-content">
                <div class="container-fluid">

                    @if (Route::currentRouteName() == 'admin_dashboard') @else
                        <div class="row">
                            <div class="col">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{@$title}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    @endif
                    
                    <!-- page-content" -->
                    @yield('content')

                </div>
            </main>

        </div>

        <!--SCRIPTS-->
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/libs/bootstrap-4.0.0/js/bootstrap.min.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('backend/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <!-- Datatables init -->
        <script src="{{ asset('backend/libs/datatables/datatables.init.js') }}"></script>

        <script src="{{asset('backend/js/app.js')}}"></script>

        <script src="{{ asset('backend/libs/notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('backend/libs/notify/notify-script.js') }}"></script>

        @include('flash')

        @yield('scripts')

    </body>

    </html>
