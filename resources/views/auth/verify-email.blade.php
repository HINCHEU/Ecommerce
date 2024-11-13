@extends('admin.layout_login')
@section('main')
    <div class="login-box">
        <div>
            <h3>Verify Your Email Address</h3>
            <div class="body-text">
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        A new verification link has been sent to your email address.
                    </div>
                @endif
                Before proceeding, please check your email for a verification link.
                If you did not receive the email,
            </div>
        </div>

        <form class="form-login flex flex-column gap24" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="tf-button w-full">
                Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="tf-button w-full">
                Logout
            </button>
        </form>
    </div>
@endsection
