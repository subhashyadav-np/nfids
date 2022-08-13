<?php

namespace App\Http\Controllers\frontend;

use App\Models\ForumAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate(
            [
                'answer' => 'string|required',
                'forum_id' => 'integer|required',
            ]
        );

        $answer = new ForumAnswer();
        $answer->answer = $request->answer;
        $answer->forum_id = $request->forum_id;
        $answer->user_id = $request->user()->id;
        $res = $answer->save();

        if ($res) {
            return back()->with('success', 'Answer posted successfully');
        } else{
            return back()->with('error', 'Something went wrong, please try again!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForumAnswer  $forumAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(ForumAnswer $forumAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForumAnswer  $forumAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(ForumAnswer $forumAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForumAnswer  $forumAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForumAnswer $forumAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForumAnswer  $forumAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForumAnswer $forumAnswer)
    {
        //
    }
}
