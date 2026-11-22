@extends('partials.layout')
@section('title', __('Dashboard'))
@section('content')
    <div class="container mx-auto">
        <h1 class="text-xl font-semibold mb-2">@lang('Dashboard')</h1>
        <div class="card bg-base-300 shadow-sm">
            <div class="card-body">
                @lang("You're logged in!")
            </div>
        </div>
    </div>
@endsection
