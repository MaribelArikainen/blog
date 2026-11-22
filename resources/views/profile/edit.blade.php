@extends('partials.layout')
@section('title', __('Profile'))
@section('content')
    <div class="container mx-auto">
        <h1 class="text-xl font-semibold mb-2">@lang('Profile')</h1>
        <div class="flex flex-col gap-4">
            <div class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
                @include('profile.partials.update-password-form')
            </div>

            <div class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
