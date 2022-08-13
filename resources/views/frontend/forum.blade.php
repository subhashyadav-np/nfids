@extends('layouts.frontend', [$title = "Discussion Forum"])

@section('styles')
    <style>
        .discussion-user {
            display: flex;
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
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            @auth
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <div class="alert alert-primary" role="alert">
                                        <i class="fa fa-edit"></i> What is your question or link?
                                    </div>
                                </a>
                            @endauth
                            @guest
                                <div class="alert alert-primary" role="alert">
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-edit"></i> Please login
                                    </a> to Post a Question
                                </div>
                            @endguest
                        </div>
                    </div>
                    @isset($forums)
                    @foreach ($forums as $item)
                    <div class="row mt-4 mb-4 mx-1">
                        <div class="col-12 mt-2 discussion-question bg-primary mb-3">
                            <h5 class="pt-2"><a href="{{ route('forum.show', $item->slug) }}" class=" text-light">{{ $item->question }}</a></h5>
                        </div>
                        <div class="col-12 discussion-user py-2">
                            <div class="profile">
                                <img src="{{ asset('frontend/images/defaults/user.png') }}" alt="user">
                            </div>
                            <div class="user-text pt-1 pl-2">
                                <h6 class="py-0 my-0 text-primary">{{ $item->user->name }}</h6>
                                <p class="py-0 my-0"><small>{{ $item->user->username }} - {{ $item->created_at }}</small></p>
                            </div>
                        </div>
                        <div class="col-12 mt-1 discussion-actions">
                            {{-- <button class="btn btn-danger btn-sm"><i class="fa fa-heart"></i></button> <span
                                class="text-danger"><small>120</small></span> --}}
                            <a href="{{ route('forum.show', $item->slug) }}" class="btn btn-primary btn-sm">Answers <i class="fa fa-comment"></i></a> <span
                                class="text-primary"><span class="badge badge-primary">{{ @$item->answers->count() }}</span></span>
                            {{-- <button class="btn btn-info btn-sm"><i class="fa fa-share"></i></button> <span
                                class="text-info"><small>12</small></span> --}}
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>
                <!--Sidebar-->
                @include('frontend.inc.tc_sidebar')
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel"><i class="fa fa-edit"></i> Start Discussion
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" role="alert">
                        <h5 class="alert-heading">Tips on getting good answers quickly</h5>
                        <ul class="pb-0 mb-0">
                            <li>Make sure your question has not been asked already</li>
                            <li>Keep your question short and to the point</li>
                            <li>Double-check grammar and spelling</li>
                        </ul>
                    </div>
                    <form action="{{ route('forum.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputForumQuestion">Question *</label>
                            <input type="text" name="forumQuestion" class="form-control" id="inputForumQuestion"
                                aria-describedby="forum_question" placeholder="Enter your question">
                            <small id="forum_question" class="form-text text-muted">Start your question with "What", "How",
                                "Why" etc.</small>
                        </div>
                        <div class="form-group">
                            <label for="forumLink">Link</label>
                            <input type="url" name="forumLink" class="form-control" id="forumLink" placeholder="optional"
                                aria-describedby="forum_link_muted_text">
                            <small id="forum_link_muted_text" class="form-text text-muted">Optional: include a link that
                                gives context</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
