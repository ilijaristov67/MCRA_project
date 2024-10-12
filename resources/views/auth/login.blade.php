@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <!-- Session Status -->
    @if (session('status'))
    <div class="alert alert-success mb-4">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="w-50">
        @csrf
        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">

            @if ($errors->has('email'))
            <div class="text-danger mt-2">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">

            @if ($errors->has('password'))
            <div class="text-danger mt-2">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>
        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
            <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            @if (Route::has('password.request'))
            <a class="text-muted" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
            <button type="submit" class="btn btn-primary">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>

@endsection