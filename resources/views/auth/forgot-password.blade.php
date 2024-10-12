@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="w-50">

        <!-- Informative Message -->
        <div class="mb-4 text-muted">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
        @endif

        <!-- Password Reset Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>

</div>
@endsection