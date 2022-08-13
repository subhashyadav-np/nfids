@extends('layouts.frontend', [$title = "Home"])

@section('content')
<div class="landing-slider">
    <div class="carousel owl-carousel">
        <div class="container-fluid landing-banner lb1">
            <div class="row banner-content">
                <div class="col-12">
                    <div>
                        <h5>Lorem ipsum dolor sit amet,</h5>
                        <h1 class="text-primary">Nepalese Forum For<br/>Interdisciplinary Studies</h1>
                        <a href="{{route('forum.index')}}" class="btn btn-outline-primary">Ask Your Question</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid landing-banner lb2">
            <div class="row banner-content">
                <div class="col-12">
                    <div>
                        <h5>Lorem ipsum dolor sit amet,</h5>
                        <h1 class="text-primary">Nepalese Forum For<br/>Interdisciplinary Studies</h1>
                        <a href="{{route('contactpage')}}" class="btn btn-outline-primary">Message Us Personally</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid landing-banner lb3">
            <div class="row banner-content">
                <div class="col-12">
                    <div>
                        <h5>Lorem ipsum dolor sit amet,</h5>
                        <h1 class="text-primary">Nepalese Forum For<br/>Interdisciplinary Studies</h1>
                        <a href="{{route('forum.index')}}" class="btn btn-outline-primary">Ask Your Question</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Why NFIDS-->
@include('frontend.inc.why_nfids')

<div class="pt-5"></div>

<!--Projects-->
@include('frontend.inc.projects')

<div class="pt-5"></div>

<!--Training And Consulting-->
@include('frontend.inc.cons_train')

<div class="pt-5"></div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <div class="bg-primary text-white pt-2 px-2">
                    <h1>Our Gallery</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($GalleryData as $item)
            <div class="col-sm-4 mb-4">
                <div class="gallery-img">
                    <a href="{{asset('frontend/images/gallery/' .$item->photo)}}" class="img-opener" data_name="{{$item->title}}">
                        <img src="{{asset('frontend/images/gallery/' .$item->photo)}}" alt="" class="gallery-photo" />
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{route('gallerypage')}}" class="btn btn-outline-primary">View All Photos <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<div class="pt-5"></div>

<!--Our Team-->
@include('frontend.inc.teams')

<div class="pt-5"></div>

<!--What People Says-->
{{--@include('frontend.inc.testimonials')--}}

<div class="pt-5"></div>


@endsection


@section('scripts')
    <script src="frontend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script>
        "use strict";
        $(".img-opener").magnificPopup({type:"image"})
    </script>
@endsection