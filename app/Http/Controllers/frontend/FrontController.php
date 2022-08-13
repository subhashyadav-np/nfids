<?php

namespace App\Http\Controllers\frontend;

use App\Models\Mail;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Team;
use App\Models\TrainingConsulting;
use App\Models\Project;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class FrontController extends Controller
{
    public function index() {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $gallery = Gallery::orderBy('id', 'desc')->get();
        $team = Team::all();
        $project = Project::all();
        return view('frontend.index', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
            'GalleryData' => $gallery,
            'TeamData' => $team,
            'ProjectData' => $project,
        ]);
    }

    public function about() {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $team = Team::all();
        return view('frontend.about', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
            'TeamData' => $team,
        ]);
    }

    public function project() {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $project = Project::all();
        return view('frontend.projects', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
            'ProjectData' => $project,

        ]);
    }

    public function training_consulting_single($slug) {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $tcSingle = TrainingConsulting::Where('slug', $slug)->first();
        
        return view('frontend.training_consulting_single', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
            'TC_Single' => $tcSingle,
        ]);
    }

    public function team_single($id) {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $team = Team::find($id);
        return view('frontend.team_single', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
            'team' => $team,
        ]);
    }

    public function gallery() {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $gallery = Gallery::orderBy('id', 'desc')->get();
        return view('frontend.gallery', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
            'GalleryData' => $gallery,
        ]);
    }

    public function blog() {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        return view('frontend.blogs', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
        ]);
    }

    public function blog_single($slug) {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        $blog = Blog::Where('slug', $slug)->first();
        return view('frontend.blog_single', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
            'Blog' => $blog,
        ]);
    }

    public function contact() {
        #for all page
        $blogs = Blog::orderBy('id', 'desc')->get();
        $tc = TrainingConsulting::orderBy('title', 'asc')->get();
        #for current page
        //
        return view('frontend.contact', [
            'BlogsData' => $blogs,
            'tcData' => $tc,
        ]);
    }

    public function store_contact(Request $request) {
        $request->validate(
            [
                'f_name' => 'string|required|max:55',
                'l_name' => 'string|required|max:55',
                'email' => 'email|required|max:90',
                'phone' => 'string|nullable|max:55',
                'subject' => 'string|required|max:90',
                'message' => 'string|required',
            ]
        );
        $mail = new Mail();
        $mail->f_name = $request->f_name;
        $mail->l_name = $request->l_name;
        $mail->email = $request->email;
        $mail->phone = $request->phone;
        $mail->subject = $request->subject;
        $mail->message = $request->message;
        $res = $mail->save();

        $data = $request->except('_token');
        FacadesMail::to('info@nfids.com')->send(new ContactMail($data));

        if ($res) {
            return redirect()->route('homepage')->with('success', 'Message Sent successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
