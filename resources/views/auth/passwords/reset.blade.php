@extends('layouts.parent')

@section('title', 'Reset Password')

@section('content')
    <section class="section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="login-card">

                        <h3 class="mb-4 text-center">Reset Password</h3>

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="mb-3">
                                <label>Verification Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Enter 6-digit code"
                                    maxlength="6" required />
                            </div>

                            <div class="mb-3">
                                <label>New Password</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>

                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required />
                            </div>

                            <button type="submit" class="main_btn w-100">
                                Reset Password
                            </button>
                        </form>
                        <p class="text-center mt-3">
                            Remember your password?
                            <a href="{{ route('login') }}">Back to Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
