@extends('layouts.parent')

@section('title', 'Verify Email')

@section('content')

    <section class="section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="login-card text-center">

                        <h3 class="mb-2">Verify Your Email</h3>
                        <p class="mb-4">
                            We sent a 6-digit code to <strong>{{ Auth::user()->email }}</strong>
                        </p>

                        {{-- Success Message --}}
                        @if (session('message'))
                            <div class="alert alert-success mb-4">
                                {{ session('message') }}
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        {{-- OTP Form --}}
                        <form method="POST" action="{{ route('verification.verify.otp') }}"> 
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="code" class="form-control text-center"
                                    placeholder="Enter 6-digit code" maxlength="6"
                                    style="font-size: 24px; letter-spacing: 10px;" required />
                            </div>
                            <button type="submit" class="main_btn w-100 mb-3">
                                Verify Email
                            </button>
                        </form>

                        {{-- Resend --}}
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                Didn't receive the code? Resend
                            </button>
                        </form>

                        <div class="mt-3">
                            <a href="{{ route('home') }}" class="google-btn">
                                Back to Home
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
