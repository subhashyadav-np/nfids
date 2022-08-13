@extends('layouts.frontend', [$title = $Blog->title, $metaDesc = $Blog->meta_desc, $metaKey = $Blog->keywords])


@section('content')
<div class="pt-5"></div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary">{{$Blog->title}}</h3>
                    </div>
                    <img class="card-img-top" src="{{asset('frontend/images/blog/' .$Blog->cover)}}" alt="Card image cap">
                    <div class="card-body">
                        <div class="answer-box mt-2">
                            <p class="card-text"><small class="text-muted"><i class="fa fa-user"></i> Posted by {{ config('app.name') }} | <i class="fa fa-clock"></i> @php $postedDate = $Blog->created_at; $date = date('d M, Y', strtotime($postedDate)); echo $date; @endphp  </small></p>
                            <p class="card-text">
                                {!! $Blog->blog !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Sidebar-->
            @include('frontend.inc.tc_sidebar')
        </div>
    </div>
</section>
@endsection