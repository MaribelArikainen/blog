@extends('partials.layout')
@section('title', isset($user) ? $user->name : 'Home page')
@section('content')
    @isset($user)
        <h1 class="text-xl font-semibold mb-2">{{ $user->name }}</h1>
    @endisset
    {{ $posts->links() }}
    <div class="grid grid-cols-4 gap-2">
        @foreach ($posts as $post)
            @include('partials.post-card')
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
