@extends('partials.layout')
@section('title', $post->title)
@section('content')
    @include('partials.post-card')
@endsection
