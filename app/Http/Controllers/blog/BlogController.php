<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {

        $posts = Post::query()->with('user')->orderBy('created_at', 'desc')->paginate(2);
        return view('blog.index' , compact('posts'));
    }

    public function create()
    {

        return view('blog.create');
    }

    public function store(CreatePostRequest $request)
    {
        $path = $request->file('image')->store('post', 'public');
        $post = $request->validated();
        $post['image'] = $path;
        $post['user_id'] = Auth::user()->id;
        Post::query()->create($post);
        return redirect()->route('blog.index')->with('ok', 'Publication ajouter');
    }
}
