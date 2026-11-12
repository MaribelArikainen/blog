@extends('partials.layout')
@section('title', __('Posts'))
@section('content')
    <div class="container mx-auto">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">@lang('New Post')</a>
        {{ $posts->links() }}
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Created')</th>
                    <th>@lang('Updated')</th>
                    <th>@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="hover:bg-base-300">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <div class="join">
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-info join-item">@lang('View')</a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning join-item">@lang('Edit')</a>
                                <button form="delete-form-{{ $post->id }}" type="submit" class="btn btn-error join-item">@lang('Delete')</button>
                            </div>
                            <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Created')</th>
                    <th>@lang('Updated')</th>
                    <th>@lang('Actions')</th>
                </tr>
            </tfoot>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
