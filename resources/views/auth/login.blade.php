@extends('layouts.frontend', [$title = "Login Page"])

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

                <form method="POST" action="{{ route('login') }}" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>

                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" aria-describedby="emailHelp" required autofocus />
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="form-check">
                        <label for="remember_me" class="form-check-label">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-button class="ml-3 btn btn-primary">
                            {{ __('Log in') }}
                        </x-button>
                    </div>

                    <div class="form-group">
                        <p class="mt-3">
                            Don't have an login account yet? <a href="{{route('register')}}">Register now</a> 
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection