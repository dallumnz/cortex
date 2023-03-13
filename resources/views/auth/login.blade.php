@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mx-auto" style="max-width: 380px; margin: 3rem;">
        <div class="card-body">
            <h4 class="card-title mb-4">{{ __('Sign in') }}</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> <!-- form-group -->
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> <!-- form-group -->

                <div class="mb-3">
                    @if (Route::has('password.request'))
                    <a class="float-end" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>
                        <span class="form-check-label">Remember me</span>
                    </label>
                </div> <!-- form-group form-check -->
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary w-100"> {{ __('Sign in') }} </button>
                </div> <!-- form-group -->
            </form>


            <p class="text-center text-muted mb-4">Or, sign in using social media</p>
            <div class="d-grid gap-3 mb-4">
                <!-- social buttons   -->
                <a href="#" class="btn btn-light w-100 disabled">
                    <i class="bi bi-google"></i> Continue with Google
                </a>
                <a href="#" class="btn btn-light w-100 disabled">
                    <i class="bi bi-facebook"></i> Continue with Facebook
                </a>
            </div>
            <!-- social buttons end  -->
            @if (Route::has('register'))
            {{-- <pclass="text-centermt-4">Don'thaveaccount?<ahref="route('register') --}}{{-- ">Signup</a></p> --}}
            @endif
        </div> <!-- card-body -->
    </div> <!-- card -->
</div>
@endsection