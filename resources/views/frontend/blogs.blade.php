@extends('layouts.frontend', [$title = "Our Blogs"])

@section('styles')
    <style>
        @media screen and (max-width:600px) {
            .blogs-cols{
             margin-left: 10px;
             margin-right: 10px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="pt-5"></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-deck">
                        <div class="row">
                            @foreach ($BlogsData as $item)
                                <!--Blog Column-->
                                <div class="col-sm-4 p-0 mt-4 blogs-cols">
                                    <div class="card">
                                        <a href="{{route('blog_single', $item->slug)}}">
                                            <img class="card-img-top" src="{{asset('frontend/images/blog/' .$item->cover)}}" alt="">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><a class="text-primary" href="{{route('blog_single', $item->slug)}}">{{$item->title}}</a></h5>
                                            <p class="card-text">
                                                {!! Str::of($item->blog)->limit(150) !!}
                                            </p>
                                            <p class="card-text"><small class="text-muted">Posted on 
                                                @php
                                                $postedDate = $item->created_at;
                                                $date = date('d M, Y', strtotime($postedDate));
                                                echo $date;
                                                @endphp    
                                            </small></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
