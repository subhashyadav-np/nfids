@extends('layouts.frontend', [$title = "Projects"])

@section('content')
<div class="pt-5"></div>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="accordion">
              @foreach ($ProjectData as $item)
              <div class="card">
                <div class="card-header" id="heading{{$item->id}}">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                      <h4>{{$item->title}}</h4>
                    </button>
                  </h5>
                </div>
            
                <div id="collapse{{$item->id}}" class="collapse @if ($item->id == '1') show @endif" aria-labelledby="heading{{$item->id}}" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <p>
                          {{$item->desc}}
                        </p>
                      </div>
                      <div class="col-sm-6">
                        <div class="card-img">
                          <img src="{{asset('frontend/images/project/' .$item->cover)}}" alt="" width="100%">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              </div>
        </div>
    </div>
</div>

@endsection