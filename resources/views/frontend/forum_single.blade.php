@extends('layouts.frontend', [$title = $forum->question])

@section('styles')
    <style>
        .discussion-user {
            display: flex;
        }

        .discussion-user.answered-user {
            display: flex;
            justify-content: flex-end
        }

        .discussion-user .profile {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            overflow: hidden;
        }

        .discussion-user .profile img {
            width: 100%;
        }

    </style>
@endsection

@section('content')
    <div class="pt-5"></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 mb-2 discussion-question">
                                    <h3 class="text-primary"><span class="badge badge-primary">Qn</span>
                                        {{ $forum->question }}</h3>
                                </div>
                                <div class="col-9 discussion-user">
                                    <div class="profile">
                                        <img src="{{ asset('frontend/images/defaults/user.png') }}" alt="">
                                    </div>
                                    <div class="user-text pt-1 pl-2">
                                        <h6 class="py-0 my-0 text-primary">{{ $forum->user->name }}</h6>
                                        <p class="py-0 my-0"><small>{{ $forum->user->username }} -
                                                {{ $forum->created_at }}</small></p>
                                    </div>
                                </div>
                                @auth
                                    <div class="col-3 mt-1 text-right discussion-actions">
                                        {{-- <button class="btn btn-danger btn-sm"><i class="fa fa-heart"></i></button> <span
                                            class="text-danger"><small>120</small></span> --}}
                                        <button data-toggle="modal" data-target="#exampleModal"
                                            class="btn btn-primary btn-sm">Post Answer  <i class="fa fa-comment"></i></button> <span
                                            class="text-primary"><span class="badge badge-primary">{{ @$forum->answers->count() }}</span></span>
                                    </div>
                                @endauth
                                @guest
                                    <span class="text-primary">Please <a href="{{ route('login') }}">Log in</a> to Post a
                                        Answer</span>
                                @endguest
                            </div>
                        </div>
                        <div class="card-body">
                            @isset($forum->answers)
                                @foreach ($forum->answers as $key => $item)
                                    <div class="answer-box mt-2">
                                        <h6 class="text-primary">#Answer{{ $key + 1 }}</h6>
                                        <p class="card-text">
                                            {{ $item->answer }}
                                        </p>
                                        <div class="row">
                                            <div style="width: 100%;" class="text-right pr-3">
                                                <h6>- Answered By</h6>
                                            </div>
                                            <div class="col-12 discussion-user answered-user">
                                                <div class="profile">
                                                    <img src="{{ asset('frontend/images/defaults/user.png') }}" alt="">
                                                </div>
                                                <div class="user-text pt-1 pl-2">
                                                    <h6 class="py-0 my-0 text-primary">{{ $item->user->name }}</h6>
                                                    <p class="py-0 my-0"><small>{{ $item->user->username }} -
                                                            {{ $item->created_at }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @auth
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fa fa-edit"></i> Give Your Answer
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            <h5 class="alert-heading">You're Doing Great :)</h5>
                            <ul class="pb-0 mb-0">
                                <li>Your valuable answer will help others, Thank You</li>
                            </ul>
                        </div>
                        <form action="{{ route('answer.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="inputForumAnswer">Your Answer *</label>
                                <textarea name="answer" id="inputForumAnswer" class="form-control" cols="30" rows="7"
                                    aria-describedby="forum_ans" placeholder="Enter your answer" required></textarea>
                                <small id="forum_ans" class="form-text text-muted">Please provide fact answers only, It'll help
                                    others.</small>
                                <input type="hidden" name="forum_id" value="{{ $forum->id }}" id="forum_id">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Answer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
