<?php

namespace App\Http\Controllers\backend;

use App\Models\CourseContent;
use App\Models\Mail;
use App\Models\TrainingConsulting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin','auth']);
    }

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
                'ch_title' => 'required|string|max:255',
                'ch_desc' => 'required|string|max:1000',
            ]
        );
        $chapter = new CourseContent;
        $chapter->training_consulting_id = $request->tc_id;
        $chapter->chapter_unit = $request->ch_unit;
        $chapter->chapter_title = $request->ch_title;
        $chapter->chapter_desc = $request->ch_desc;

        $res = $chapter->save();
        if ($res) {
            return redirect()->route('course_content.show', $request->tc_slug)->with('success', 'Chapter added successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        #for sidebar on all page
        $unreadMail = Mail::Where('status', 'unread')->get();
        $unreadMailCount = count($unreadMail);
        #for currentpage
        $tc = TrainingConsulting::Where('slug', $slug)->first();
        $tc_id = $tc->id;
        $tc_slug = $tc->slug;

        $chapter = CourseContent::Where('training_consulting_id', $tc_id)->get();
        return view('backend.course_content', [
            'UnreadMailCount' => $unreadMailCount,
            'TC_ID' => $tc_id,
            'TC_SLUG' => $tc_slug,
            'ChapterData' => $chapter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'ch_title' => 'required|string|max:255',
                'ch_desc' => 'required|string|max:1000',
            ]
        );
        $chapter = CourseContent::find($id);
        $chapter->training_consulting_id = $request->tc_id;
        $chapter->chapter_unit = $request->ch_unit;
        $chapter->chapter_title = $request->ch_title;
        $chapter->chapter_desc = $request->ch_desc;

        $res = $chapter->save();
        if ($res) {
            return redirect()->route('course_content.show', $request->tc_slug)->with('success', 'Chapter updated successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = CourseContent::find($id);
        $tc_id = $course->training_consulting_id;
        $tc = TrainingConsulting::find($tc_id);
        $tc_slug = $tc->slug;
        $res = CourseContent::destroy($id);
        if ($res) {
            return redirect()->route('course_content.show', $tc_slug)->with('success', 'Chapter Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function showModal($id) {
        $courseContent = CourseContent::find($id);
        return json_encode($courseContent);
    }
}
