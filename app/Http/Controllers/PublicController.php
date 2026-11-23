<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index() {
        if(request()->wantsJson()) {
            return Post::latest()->with(['user', 'tags'])->paginate(16);
        }
        $posts = Post::latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function user(User $user) {
        $posts = $user->posts()->latest()->simplePaginate(16);
        return view('welcome', compact('posts', 'user'));
    }

    public function post(Post $post){
        if(request()->wantsJson()) {
            return $post->load(['user', 'tags']);
        }
        return view('post', compact('post'));
    }

    public function page1() {
        return view('page1');
    }

    public function page2() {
        return view('page2');
    }
}
