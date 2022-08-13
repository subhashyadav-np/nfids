<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <div class="bg-primary text-white pt-2 px-2">
                    <h1>Training & Consulting</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="owl-carousel tc-crausel">
                @foreach ($tcData as $item)
                <div class="col-12">
                    <div class="tc-card border-primary p-2">
                        <div class="tc-card-img">
                            <img src="{{asset('frontend/images/training_consulting/' .$item->cover)}}" alt="" width="100%">
                        </div>
                        <div class="tc-heading mt-2">
                            <h5 class="text-primary mb-1">{{$item->title}}</h5>
                        </div>
                        <div class="tc-paragraph">
                            <p class="mb-1">{!! Str::of($item->desc)->limit(150) !!}</p>
                        </div>
                        <div class="tc-button text-center">
                            <a href="{{ route('training_consulting_single', $item->slug) }}" class="btn btn-outline-primary btn-sm btn-block">View Detail <i class="fa fa-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>