@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mx-auto" style="max-width: 380px; margin-top:60px;">
        <div class="card-body">
            <h4 class="card-title mb-4">Sign up</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> <!-- form-group -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> <!-- form-group -->
                <div class="mb-3">
                    <label class="form-label">Create password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> <!-- form-group -->
                <div class="mb-3">
                    <label class="form-label">Confirm password</label>
                    <input id="password-confirm" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                        required autocomplete="new-password">

                </div> <!-- form-group -->
                <div class="mb-3">
                    <p class="small text-center text-muted">By signing up, you confirm that you've read and accepted our
                        Terms of Service and Privacy Policy.</p>
                </div> <!-- form-group   -->
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary w-100"> Sign up </button>
                </div> <!-- form-group -->

            </form>
            <p class="text-center small text-muted">Or, sign up with</p>
            <!-- social buttons   -->
            <div class="d-flex gap-2 mb-4">
                <a href="#" class="w-50 btn btn-light disabled">
                    <i class="bi bi-google"></i> Google
                </a>

                <a href="#" class="w-50 btn btn-light disabled">
                    <i class="bi bi-facebook"></i> Facebook
                </a>
            </div>
            <!-- social buttons end  -->
            @if (Route::has('login'))
            <p class="text-center mb-2">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            @endif

        </div> <!-- card-body -->
    </div> <!-- card  -->
</div>
@endsection