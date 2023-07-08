<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    public function index()
    {
        //dd(request(['search']));
        return view('posts.index',[
            'posts'=>Post::latest()
            ->filter(request(['search', 'category','author']))
            ->paginate(6)->withQueryString()
            
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
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
