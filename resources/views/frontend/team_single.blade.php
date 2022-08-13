@extends('layouts.frontend', [$title = $team->name])

@section('content')
<div class="mt-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mt-3">
                <img src="{{ asset('images/team/' .$team->avatar) }}" alt="" width="100%">
            </div>
            <div class="col-sm-8 mt-3">
                <h5 class="name text-primary mt-2 mb-1">{{$team->name}}</h5>
                <h6 class="job mt-0">{{$team->job}}</h6>
                <p>
                    {!! $team->paragraph !!}
                </p>
            </div>
        </div>
    </div>
@endsection