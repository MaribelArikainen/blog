@extends('partials.layout')
@section('title', __('Tags'))
@section('content')
    <div class="container mx-auto">
        <a href="{{ route('tags.create') }}" class="btn btn-primary">@lang('New Tag')</a>
        {{ $tags->links() }}
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>@lang('Name')</th>
                    <th>@lang('Posts')</th>
                    <th>@lang('Created')</th>
                    <th>@lang('Updated')</th>
                    <th>@lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr class="hover:bg-base-300">
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->posts_count }}</td>
                        <td>{{ $tag->created_at }}</td>
                        <td>{{ $tag->updated_at }}</td>
                        <td>
                            <div class="join">
                                <a href="{{ route('tags.show', $tag) }}" class="btn btn-info join-item">@lang('View')</a>
                                <a href="{{ route('tags.edit', $tag) }}" class="btn btn-warning join-item">@lang('Edit')</a>
                                <button form="delete-form-{{ $tag->id }}" type="submit" class="btn btn-error join-item">@lang('Delete')</button>
                            </div>
                            <form id="delete-form-{{ $tag->id }}" action="{{ route('tags.destroy', $tag) }}" method="POST">
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
                    <th>@lang('Name')</th>
                    <th>@lang('Posts')</th>
                    <th>@lang('Created')</th>
                    <th>@lang('Updated')</th>
                    <th>@lang('Actions')</th>
                </tr>
            </tfoot>
        </table>
        {{ $tags->links() }}
    </div>
@endsection
