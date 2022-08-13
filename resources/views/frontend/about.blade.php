@extends('layouts.frontend', [$title = "About Us"])

@section('content')

    <!--Why NFIDS-->
    @include('frontend.inc.why_nfids')

    <div class="pt-5"></div>

    <!--Our Team-->
    @include('frontend.inc.teams')

@endsection