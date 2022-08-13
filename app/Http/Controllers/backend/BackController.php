<?php

namespace App\Http\Controllers\backend;

use App\Models\Mail;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin','auth']);
    }
    public function index() {
        #for sidebar on all page
        $unreadMail = Mail::Where('status', 'unread')->get();
        $unreadMailCount = count($unreadMail);
        #for currentpage
        //
        return view('backend.index', [
            'UnreadMailCount' => $unreadMailCount,
        ]);
    }
    public function admin_profile() {
        #for sidebar on all page
        $unreadMail = Mail::Where('status', 'unread')->get();
        $unreadMailCount = count($unreadMail);
        #for currentpage
        //
        return view('backend.profile', [
            'UnreadMailCount' => $unreadMailCount,
        ]);
    }
    public function update_admin_profile(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->name = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            if ($user->avatar != null) {
                $existAvatar = public_path('storage/' . $user->avatar);
                if (file_exists($existAvatar)) {
                    unlink($existAvatar);
                }
            }
            $avtar = $request->file('avatar')->storePublicly('admin', 'public');
            $user->avatar = $avtar;
        }

        $res = $user->save();

        if ($res) {
            return redirect()->route('admin_profile')->with('success', 'Profile Updated successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required|string',
                'password' => 'required|string|confirmed|min:8',
            ]
        );
        $user = User::find($request->user()->id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password Updated!');
        } else {
            return back()->with('error', 'Current Password did not matched');
        }
    }
}
