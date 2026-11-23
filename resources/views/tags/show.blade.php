@extends('partials.layout')
@section('title', $tag->name)
@section('content')
    <div class="container mx-auto">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">@lang('Back')</a>
        <div class="card bg-base-300 shadow-sm">
            <table class="table table-zebra">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $tag->id }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Name')</th>
                        <td>{{ $tag->name }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Posts')</th>
                        <td>{{ $tag->posts()->count() }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Created')</th>
                        <td>{{ $tag->created_at }}</td>
                    </tr>
                    <tr>
                        <th>@lang('Updated')</th>
                        <td>{{ $tag->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
