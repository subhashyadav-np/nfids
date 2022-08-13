@extends('layouts.backend', [$title = "Admin Profile"])

@section('styles')
    <style>
        .user-profile-row{
            display: flex;
        }
        @media screen and (max-width:600px) {
            .user-profile-row .col-second{
                order: 1;
            }
            .user-profile-row .col-first{
                order: 2;
            }
        }
    </style>
@endsection

@section('content')

    <div class="row user-profile-row">
        <div class="col-sm-6 mt-2 col-first">
            <div class="alert alert-primary" role="alert">
                Update General Information
            </div>
            <form method="POST" action="{{route('update_admin_profile')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="fullname" value="{{Auth::user()->name}}" class="form-control" id="fullname" placeholder="eg. john doe" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control" name="username" id="username" value="{{Auth::user()->username}}" placeholder="eg. johndoe99">
                    </div>
                </div>
                <div class="form-group">
                    <label for="adminAvatar">Admin Avatar</label>
                    <input type="file" name="avatar" class="form-control-file" id="adminAvatar" aria-describedby="adminAvtarHelp">
                    <small id="adminAvtarHelp" class="form-text text-muted">Maximum image size is 2048KB, Recommended Resolution: 1*1</small>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input id="email" value="{{Auth::user()->email}}" class="form-control" type="email" name="email" aria-describedby="emailHelp" required placeholder="example@domain.com"/>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">Keep your administrative email where we can send you varification</small>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
        <div class="col-sm-6 mt-2 mb-2 col-second">
            <div class="text-center">
                <img src="{{ Auth::user()->avatar == NULL ? asset('backend/images/defaults/user.jpg') : asset('storage/' .Auth::user()->avatar) }}" alt="" width="50%">
            </div>
        </div>
    </div>

    <hr class="mt-5">

    <div class="row mt-5 user-profile-row">
        <div class="col-sm-6 col-first">
            <div class="alert alert-primary" role="alert">
                Update Admin Credential
            </div>
            <form action="{{ route('updatePassword') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-key"></i></div>
                        </div>
                        <input id="currentPassword" class="form-control" type="password" name="current_password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-key"></i></div>
                        </div>
                        <input id="newPassword" class="form-control" type="password" name="password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confPassword">Confirm Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-key"></i></div>
                        </div>
                        <input id="confPassword" class="form-control" type="password" name="password_confirmation" required/>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Credential</button>
            </form>
        </div>
        <div class="col-sm-6 col-second">
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Password Accept</h5>
                <ul class="pb-0 mb-0">
                    <li>Password must contain atleast 8 character</li>
                    <li>Password must contain atleast 1 special character</li>
                    <li>Password must contain atleast 1 uppercase character</li>
                    <li>Password must contain atleast 1 lowercase character</li>
                </ul>
            </div>
        </div>
    </div>

@endsection
