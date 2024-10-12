@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center justify-content-center vh-100">
    <form method="POST" action="{{ route('register') }}" class="w-50 p-4 border border-3 rounded-3" enctype="multipart/form-data">
        @csrf
        <div class=" mb-3">
            <span class="text-muted">Fields marked with <span>*</span> are not optional</span>
        </div>


        <!-- Name -->
        <div class="row">
            <div class="form-group mb-3 col-md-6">
                <label for="name" class="form-label">{{ __('Name') }} <span>*</span></label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @if ($errors->has('name'))
                <div class="text-danger mt-2">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </div>
            <!-- Surname -->
            <div class="form-group mb-3 col-md-6">
                <label for="surname" class="form-label">{{ __('Surname') }} <span>*</span></label>
                <input id="surname" class="form-control" type="text" name="surname" value="{{ old('surname') }}" required autofocus autocomplete="surname">

                @if ($errors->has('surname'))
                <div class="text-danger mt-2">
                    {{ $errors->first('surname') }}
                </div>
                @endif
            </div>
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }} <span>*</span></label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">

            @if ($errors->has('email'))
            <div class="text-danger mt-2">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
        <div class="row">
            <!-- Password -->
            <div class="form-group mb-3 col-md-6">
                <label for="password" class="form-label">{{ __('Password') }} <span>*</span></label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">

                @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>
            <!-- Confirm Password -->
            <div class="col-md-6 mb-3 form-group">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }} <span>*</span></label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">

                @if ($errors->has('password_confirmation'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="biography" class="form-label">{{ __('Biography') }}</label>
            <textarea class="form-control" name="biography" id="biography">{{ old('biography') }}</textarea>
            @if ($errors->has('biography'))
            <div class="text-danger mt-2">
                {{ $errors->first('biography') }}
            </div>
            @endif
        </div>
        <!-- City -->
        <div class="row">
            <div class="form-group mb-3 col-md-6">
                <label for="city" class="form-label">{{ __('City') }}</label>
                <input id="city" class="form-control" type="text" name="city" value="{{ old('city') }}" autofocus autocomplete="city">

                @if ($errors->has('city'))
                <div class="text-danger mt-2">
                    {{ $errors->first('city') }}
                </div>
                @endif
            </div>
            <!-- Country -->
            <div class="form-group mb-3 col-md-6">
                <label for="country" class="form-label">{{ __('Country') }}</label>
                <input id="country" class="form-control" type="text" name="country" value="{{ old('country') }}" autofocus autocomplete="country">

                @if ($errors->has('country'))
                <div class="text-danger mt-2">
                    {{ $errors->first('country') }}
                </div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">{{ __('Number') }}</label>
            <input id="number" class="form-control" type="tel" name="number" value="{{ old('number') }}" autocomplete="number">

            @if ($errors->has('number'))
            <div class="text-danger mt-2">
                {{ $errors->first('number') }}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('Title') }}</label>
            <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" autocomplete="title">

            @if ($errors->has('title'))
            <div class="text-danger mt-2">
                {{ $errors->first('title') }}
            </div>
            @endif
        </div>
        <div class="row">
            <div class="form-group mb-3 col-md-6">
                <label for="cv" class="form-label">{{ __('CV') }}</label>
                <input id="cv" class="form-control" type="file" name="cv" value="{{ old('cv') }}" autofocus autocomplete="cv">

                @if ($errors->has('cv'))
                <div class="text-danger mt-2">
                    {{ $errors->first('cv') }}
                </div>
                @endif
            </div>
            <!-- Country -->
            <div class="form-group mb-3 col-md-6">
                <label for="image" class="form-label">{{ __('Image') }}</label>
                <input id="image" class="form-control" type="file" name="image" value="{{ old('image') }}" autofocus autocomplete="image">

                @if ($errors->has('image'))
                <div class="text-danger mt-2">
                    {{ $errors->first('image') }}
                </div>
                @endif
            </div>
        </div>
        <!-- Already Registered Link -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a class="text-muted" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-primary ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>

<script>
    let spans = document.querySelectorAll('span');
    spans.forEach(element => {
        element.classList.add('red');
    });
</script>

@endsection