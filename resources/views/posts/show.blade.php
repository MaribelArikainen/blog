@extends('partials.layout')
@section('title', $post->title)
@section('content')
    <div class="container mx-auto">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">@lang('Back')</a>
        <div class="card bg-base-300 shadow-sm">
            <table class="table table-zebra">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $post->id }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Title')</th>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Content')</th>
                        <td>{!! $post->displayBody !!}</td>
                    </tr>
                    <tr>
                        <th>@lang('Created')</th>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Updated')</th>
                        <td>{{ $post->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
