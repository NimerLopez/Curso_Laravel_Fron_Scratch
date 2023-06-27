<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    public function index()
    {
        //dd(request(['search']));
        return view('posts',[
            'posts'=>Post::latest()->filter(request(['search']))->get(),
            'categories'=>Category::all()
        ]);
    }
    public function show(Post $post)
    {
        return view('post', ['post' => $post]);
    }

    public function getPosts()
    {
        //Post::latest()->filter()->get()
        // $posts=Post::latest();
        // if (request('search')) {
        //     $posts
        //     ->where('title','like','%' . request('search') . '%')
        //     ->orWhere('body','like','%' . request('search') . '%');
        // }
        //return $posts->get();
    }
}
