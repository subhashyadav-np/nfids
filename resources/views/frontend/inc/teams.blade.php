<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <div class="bg-primary text-white pt-2 px-2">
                    <h1>Our Teams</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($TeamData as $item)
            <div class="col-sm-3 pb-4">
                <div class="team-profile border border-primary text-center" style="overflow: hidden">
                    <img src="{{ asset('images/team/' .$item->avatar) }}" alt="" width="100%">
                    <div class="texts">
                        <h6 class="name text-primary mt-2 mb-1">{{$item->name}}</h6>
                        <h6 class="job mt-0 mb-1">{{$item->job}}</h6>
                        <a href="{{route('team_single', $item->id)}}" class="mt-2 btn btn-outline-primary px-5">{{ __('View') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>