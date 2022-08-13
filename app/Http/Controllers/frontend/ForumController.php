<?php

namespace App\Http\Controllers\frontend;

use App\Models\Forum;
use App\Models\Blog;
use App\Models\TrainingConsulting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $forums = Forum::orderBy('id', 'desc')->get();
        return view('frontend.forum', ['forums' => $forums, 'BlogsData' => $blogs, 'tcData' => $tc,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate(
                [
                    'forumQuestion' => 'string|required|max:199',
                    'forumLink' => 'url|nullable',
                ]
            );

            $forum = new Forum();

            $forum->question = $request->forumQuestion;
            $forum->link = $request->forumLink;
            $forum->user_id = $request->user()->id;
            $string = Str::of($request->forumQuestion)->limit(100) . ' ' . rand(11, 9999);
            $forum->slug = Str::of($string)->slug('-');

            $res = $forum->save();

            if ($res) {
                return back()->with('success', 'Forun Posted Successfully');
            } else {
                return back()->with('error', 'Something went wrong');
            }
        } else {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $forum = Forum::where('slug', $slug)->first();
        return view('frontend.forum_single', ['forum' => $forum, 'BlogsData' => $blogs, 'tcData' => $tc,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
