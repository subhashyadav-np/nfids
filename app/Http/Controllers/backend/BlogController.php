<?php

namespace App\Http\Controllers\backend;

use App\Models\Mail;
use App\Models\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
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
        $blogs = Blog::all();
        return view('backend.blogs', [
            'UnreadMailCount' => $unreadMailCount,
            'BlogsData' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #for sidebar on all page
        $unreadMail = Mail::Where('status', 'unread')->get();
        $unreadMailCount = count($unreadMail);
        #for currentpage
        //
        return view('backend.blog_create', [
            'UnreadMailCount' => $unreadMailCount,
        ]);
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
                'title' => 'required|string|max:190',
                'blog' => 'required|string',
                'meta_desc' => 'nullable|string|max:255',
                'keywords' => 'nullable|string|max:255',
                'cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = Str::of($request->title)->slug('-');
        $blog->blog = $request->blog;
        $blog->user_id = $request->user()->id;
        $blog->meta_desc = $request->meta_desc;
        $blog->keywords = $request->keywords;
        if ($request->hasFile('cover')) {
            $originalImage = $request->file('cover');
            $originalImage->move(public_path() . '/frontend/images/blog', $img = Str::of($request->title)->slug('-') . '.jpg');
            $blog->cover = $img;
        }
        $res = $blog->save();
        if ($res) {
            return redirect()->route('blog.index')->with('success', 'Blog Posted successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        #for sidebar on all page
        $unreadMail = Mail::Where('status', 'unread')->get();
        $unreadMailCount = count($unreadMail);
        #for currentpage
        $blog = Blog::Where('slug', $slug)->first();
        return view('backend.blog_edit', [
            'UnreadMailCount' => $unreadMailCount,
            'Blog' => $blog,
        ]);
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
                'title' => 'required|string|max:190',
                'blog' => 'required|string',
                'meta_desc' => 'nullable|string|max:255',
                'keywords' => 'nullable|string|max:255',
                'cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = Str::of($request->title)->slug('-');
        $blog->blog = $request->blog;
        $blog->meta_desc = $request->meta_desc;
        $blog->keywords = $request->keywords;
        if ($request->hasFile('cover')) {
            if ($blog->cover != null) {
                $existCover = public_path('/frontend/images/blog/' . $blog->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            $originalImage = $request->file('cover');
            $originalImage->move(public_path() . '/frontend/images/blog', $img = Str::of($request->title)->slug('-') . '.jpg');
            $blog->cover = $img;
        }
        $res = $blog->save();
        if ($res) {
            return redirect()->route('blog.index')->with('success', 'Blog Updated successfully');
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
        $blog = Blog::find($id);
        $res = Blog::destroy($id);
        if ($res) {
            if ($blog->cover != null) {
                $existCover = public_path('/frontend/images/blog/' . $blog->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }
            }
            return redirect()->route('blog.index')->with('success', 'Blog Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
