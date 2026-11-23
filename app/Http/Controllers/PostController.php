<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $posts = $user->posts()->latest()->paginate(16);
        if(request()->wantsJson()) {
            return $posts;
        }
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post($request->validated());
        $post->user()->associate(Auth::user());
        $post->save();
        $post->tags()->attach($request->validated('tags') ?? []);
        if($request->wantsJson()) {
            return $post;
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if(request()->wantsJson()) {
            return $post->load('tags');
        }
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        if(!$request->wantsJson() || $request->has('tags')) {
            $post->tags()->sync($request->validated('tags') ?? []);
        }
        if($request->wantsJson()) {
            return $post;
        }
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if(request()->wantsJson()) {
            return $post;
        }
        return redirect()->route('posts.index');
    }
}
