<?php

namespace App\Http\Controllers\backend;

use App\Models\Gallery;
use App\Models\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
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
        $gallery = Gallery::orderBy('id', 'desc')->get();
        return view('backend.gallery', [
            'UnreadMailCount' => $unreadMailCount,
            'GalleryData' => $gallery,
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
                'photoTitle' => 'required|string|max:60',
                'photoFile' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $gallery = new Gallery;
        $gallery->title = $request->photoTitle;
        if ($request->hasFile('photoFile')) {
            $originalImage = $request->file('photoFile');
            $originalImage->move(public_path() . '/frontend/images/gallery', $img = Str::of($request->photoTitle)->slug('-') . '.jpg');
            $gallery->photo = $img;
        }
        $res = $gallery->save();
        if ($res) {
            return redirect()->route('gallery.index')->with('success', 'Photo added successfully');
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
        $gallery = Gallery::find($id);
        return json_encode($gallery);
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
                'photoTitle' => 'required|string|max:60',
                'photoFile' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $gallery = Gallery::find($id);
        $gallery->title = $request->photoTitle;
        if ($request->hasFile('photoFile')) {
            if ($gallery->cover != null) {
                $existCover = public_path('/images/gallery/' . $gallery->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            $originalImage = $request->file('photoFile');
            $originalImage->move(public_path() . '/frontend/images/gallery', $img = Str::of($request->photoTitle)->slug('-') . '.jpg');
            $gallery->photo = $img;
        }
        $res = $gallery->save();
        if ($res) {
            return redirect()->route('gallery.index')->with('success', 'Photo updated successfully');
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
        $gallery = Gallery::find($id);
        $res = Gallery::destroy($id);
        if ($res) {
            if ($gallery->cover != null) {
                $existCover = public_path('/images/gallery/' . $gallery->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            return redirect()->route('gallery.index')->with('success', 'Photo Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
