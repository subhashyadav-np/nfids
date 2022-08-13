<?php

namespace App\Http\Controllers\backend;

use App\Models\Mail;
use App\Models\Project;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        $project = Project::all();
        return view('backend.project', [
            'UnreadMailCount' => $unreadMailCount,
            'ProjectData' => $project,
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
                'project_title' => 'required|string|max:60',
                'project_desc' => 'required|string',
                'project_cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $project = new Project;
        $project->title = $request->project_title;
        $project->desc = $request->project_desc;

        if ($request->hasFile('project_cover')) {
            $originalImage = $request->file('project_cover');
            $originalImage->move(public_path() . '/frontend/images/project', $img = Str::of($request->project_title)->slug('-') . '.jpg');
            $project->cover = $img;
        }

        $res = $project->save();
        if ($res) {
            return redirect()->route('project.index')->with('success', 'Project added successfully');
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
        $project = Project::find($id);
        return json_encode($project);
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
                'project_title' => 'required|string|max:60',
                'project_desc' => 'required|string',
                'project_cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $project = Project::find($id);
        $project->title = $request->project_title;
        $project->desc = $request->project_desc;

        if ($request->hasFile('project_cover')) {
            if ($project->cover != null) {
                $existCover = public_path('/frontend/images/project/' . $project->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            $originalImage = $request->file('project_cover');
            $originalImage->move(public_path() . '/frontend/images/project', $img = Str::of($request->project_title)->slug('-') . '.jpg');
            $project->cover = $img;
        }

        $res = $project->save();
        if ($res) {
            return redirect()->route('project.index')->with('success', 'Project Upadted successfully');
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
        $project = Project::find($id);
        $res = Project::destroy($id);
        if ($res) {
            if ($project->cover != null) {
                $existCover = public_path('/frontend/images/project/' . $project->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            return redirect()->route('project.index')->with('success', 'Project Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
