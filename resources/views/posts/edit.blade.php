@extends('partials.layout')
@section('title', __('Edit Post'))
@section('content')
    <div class="container mx-auto">
        <form action="{{ route('posts.update', $post) }}" method="POST" class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
            @csrf
            @method('PUT')
            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Title')</legend>
                <input name="title" value="{{ old('title') ?? $post->title }}" type="text" class="input w-full @error('title') input-error @enderror" placeholder="{{ __('Title') }}" />
                @error('title')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Content')</legend>
                <textarea name="body" class="textarea h-36 w-full @error('body') textarea-error @enderror" placeholder="{{ __('Some content here') }}">{{ old('body') ?? $post->body }}</textarea>
                @error('body')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Tags')</legend>
                <div class="flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" aria-label="{{ $tag->name }}"
                            class="btn btn-sm" @checked(in_array($tag->id, old('tags', $post->tags->pluck('id')->all()))) />
                    @endforeach
                </div>
                <span class="label">@lang('Optional')</span>
            </fieldset>
            <button class="btn btn-primary">@lang('Update')</button>
        </form>
    </div>
@endsection
