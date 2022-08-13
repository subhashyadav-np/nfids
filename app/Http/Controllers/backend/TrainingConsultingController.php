<?php

namespace App\Http\Controllers\backend;

use App\Models\TrainingConsulting;
use App\Models\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TrainingConsultingController extends Controller
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
        #for sidebar on all page
        $unreadMail = Mail::Where('status', 'unread')->get();
        $unreadMailCount = count($unreadMail);
        #for currentpage
        $tc = TrainingConsulting::all();
        return view('backend.training_consulting', [
            'UnreadMailCount' => $unreadMailCount,
            'TrainCons' => $tc,
        ]);
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
                'tc_title' => 'required|string|max:255',
                'tc_desc' => 'required|string',
                'tc_cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $tc = new TrainingConsulting;
        $tc->title = $request->tc_title;
        $tc->slug = Str::of($request->tc_title)->slug('-');
        $tc->desc = $request->tc_desc;
        if ($request->hasFile('tc_cover')) {
            $originalImage = $request->file('tc_cover');
            $originalImage->move(public_path() . '/frontend/images/training_consulting', $img = Str::of($request->tc_title)->slug('-') . '.jpg');
            $tc->cover = $img;
        }
        $res = $tc->save();
        if ($res) {
            return redirect()->route('training_consulting.index')->with('success', 'Training & Consulting added successfully');
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
    public function show($id)
    {
        $tc = TrainingConsulting::find($id);
        return json_encode($tc);
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
                'tc_title' => 'required|string|max:255',
                'tc_desc' => 'required|string',
                'tc_cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $tc = TrainingConsulting::find($id);
        $tc->title = $request->tc_title;
        $tc->slug = Str::of($request->tc_title)->slug('-');
        $tc->desc = $request->tc_desc;
        if ($request->hasFile('tc_cover')) {
            if ($tc->cover != null) {
                $existCover = public_path('/frontend/images/training_consulting/' . $tc->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            $originalImage = $request->file('tc_cover');
            $originalImage->move(public_path() . '/frontend/images/training_consulting', $img = Str::of($request->tc_title)->slug('-') . '.jpg');
            $tc->cover = $img;
        }

        $res = $tc->save();
        if ($res) {
            return redirect()->route('training_consulting.index')->with('success', 'Training & Consulting updated successfully');
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
        $tc = TrainingConsulting::find($id);
        $res = TrainingConsulting::destroy($id);
        if ($res) {
            if ($tc->cover != null) {
                $existCover = public_path('/frontend/images/training_consulting/' . $tc->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            return redirect()->route('training_consulting.index')->with('success', 'Training & Consulting Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
