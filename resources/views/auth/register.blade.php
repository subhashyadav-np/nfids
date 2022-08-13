@extends('layouts.frontend', [$title = "Sign Up Page "])

@section('styles')
    <style>
        .login-avtar{
            height: 80px;
            width: 80px;
            margin: 0 auto;
            overflow: hidden;
        }
        .login-avtar img{
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

@section('content')

    <div class="pt-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="login-avtar mb-2" >
                    <img src="{{asset('backend/images/defaults/user.jpg')}}" alt="">
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}" class="mb-4">
                    @csrf

                    <div class="form-group">
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required placeholder="eg. john doe"/>
                    </div>

                    <div class="form-group">
                        <x-label for="email" :value="__('Email address')" />
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" aria-describedby="emailHelp" required placeholder="eg. example@domain.com" />
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <x-label for="username" :value="__('Username')" />
                        <input id="username" class="form-control" type="text" name="username" :value="old('username')" aria-describedby="usernameHelp" required placeholder="eg. user12" />
                        <small id="usernameHelp" class="form-text text-muted">Username nust include letters & numbers both</small>
                    </div>

                    <div class="form-group">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="form-group">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                    </div>

                    <div class="form-check">
                        <label for="remember_me" class="form-check-label">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-button class="ml-3 btn btn-primary">
                            {{ __('Register') }}
                        </x-button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
