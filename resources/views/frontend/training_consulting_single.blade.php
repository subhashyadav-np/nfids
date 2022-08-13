@extends('layouts.frontend', [$title = $TC_Single->title])

@section('styles')
    <style>
      .badge-pill{
        height: 20px; width:20px; display:flex; justify-content: center; align-items: center;
      }
    </style>
@endsection

@section('content')
    <div class="pt-5"></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{asset('frontend/images/training_consulting/' .$TC_Single->cover)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center text-primary">{{$TC_Single->title}}</h5>
                            <p class="card-text">
                                {!! $TC_Single->desc !!}
                            </p>
                            <h5 class="card-title text-center mt-4"> Course Content </h5>

                            <div class="course-content">
                              <div id="accordion">
                                @foreach ($TC_Single->chapter as $item)
                                <div class="card">
                                  <div class="card-header" id="heading{{$item->chapter_unit}}">
                                    <h5 class="mb-0 text-primary"> {{$item->chapter_title}}
                                      <button class="btn btn-link collapsed ws-pw course-content-togler" data-toggle="collapse" data-target="#collapse{{$item->chapter_unit}}" aria-expanded="true" aria-controls="collapse{{$item->chapter_unit}}"><span class="badge badge-pill badge-primary"> <i class="fas fa-plus icon"></i></span></button>
                                    </h5>
                                  </div>
                              
                                  <div id="collapse{{$item->chapter_unit}}" class="collapse" aria-labelledby="heading{{$item->chapter_unit}}" data-parent="#accordion">
                                    <div class="card-body">
                                      {{$item->chapter_desc}}
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              </div>
                            </div>

                            <p class="card-text mt-4"><small class="text-muted">Last updated 
                              @php
                              $postUpDate = $TC_Single->updated_at;
                              $date = date('d M, Y', strtotime($postUpDate));
                              echo $date;
                              @endphp  
                            </small></p>
                        </div>
                    </div>
                </div>
                <!--Sidebar-->
                @include('frontend.inc.tc_sidebar')
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('frontend/js/train_cons.js')}}"></script>
@endsection