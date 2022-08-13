<?php

namespace App\Http\Controllers\backend;

use App\Models\Team;
use App\Models\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
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
        $team = Team::all();
        return view(
            'backend.team',
            [
                'Teams' => $team,
                'UnreadMailCount' => $unreadMailCount,
            ]
        );
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
                'tname' => 'required|string|max:99',
                'tjob' => 'nullable|string',
                'avatar' => 'sometimes|image|mimes:jpg,jpeg,png',
            ]
        );

        $team = new Team;
        $team->name = $request->tname;
        $team->job = $request->tjob;
        $team->paragraph = $request->paragraph;
        if ($request->hasFile('avatar')) {
            $originalImage = $request->file('avatar');
            $originalImage->move(public_path() . '/images/team', $img = Str::of($request->tname)->slug('-') . Str::random(15) . '.jpg');
            $team->avatar = $img;
        }
        $res = $team->save();
        if ($res) {
            return redirect()->route('team.index')->with('success', 'Team Added successfully');
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
        $team = Team::find($id);
        return json_encode($team);
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
                'tname' => 'required|string|max:99',
                'tjob' => 'nullable|string',
                'avatar' => 'sometimes|image|mimes:jpg,jpeg,png',
            ]
        );

        $team = Team::find($id);
        $team->name = $request->tname;
        $team->job = $request->tjob;
        $team->paragraph = $request->paragraph;
        if ($request->hasFile('avatar')) {
            if ($team->avatar != null) {
                $existAvatar = public_path('/images/team/' . $team->avatar);
                if (file_exists($existAvatar)) {
                    unlink($existAvatar);
                }
            }
            $originalImage = $request->file('avatar');
            $originalImage->move(public_path() . '/images/team', $img = Str::of($request->tname)->slug('-') . Str::random(15) . '.jpg');
            $team->avatar = $img;
        }
        $res = $team->save();
        if ($res) {
            return redirect()->route('team.index')->with('success', 'Team Updated successfully');
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
        $team = Team::find($id);
        $res = Team::destroy($id);
        if ($res) {
            if ($team->avatar != null) {
                $existAvatar = public_path('/images/team/' . $team->avatar);
                if (file_exists($existAvatar)) {
                    unlink($existAvatar);
                }
            }
            return redirect()->route('team.index')->with('success', 'Team Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
