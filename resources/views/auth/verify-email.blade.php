@extends('partials.layout')
@section('title', __('Verify Email'))
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
            <p class="text-sm">
                @lang('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')
            </p>

            @if (session('status') == 'verification-link-sent')
                <div role="alert" class="alert alert-success mt-2">
                    @lang('A new verification link has been sent to the email address you provided during registration.')
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn btn-primary">
                        @lang('Resend Verification Email')
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        @lang('Log Out')
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
