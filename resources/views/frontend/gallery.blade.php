@extends('layouts.frontend', [$title = "Our Photos"])

@section('content')
<div class="mt-5"></div>
    <div class="container">
        <div class="row">
            @foreach ($GalleryData as $item)
            <div class="col-sm-4 mb-4">
                <div class="gallery-img">
                    <a href="{{asset('frontend/images/gallery/' .$item->photo)}}" class="img-opener" data_name="{{$item->title}}">
                        <img src="{{asset('frontend/images/gallery/' .$item->photo)}}" alt="" class="" />
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="frontend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script>
        "use strict";
        $(".img-opener").magnificPopup({type:"image"})
    </script>
@endsection