<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {

        $posts = Post::query()->with('user')->orderBy('created_at', 'desc')->paginate(2);
        return view('blog.index' , compact('posts'));
    }

    public function show(Post $post)
    {
        $post = $post->load('user');
        return view('blog.show', compact('post'));
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


    public function update(UpdatePost $request, Post $post)
    {
        if($request->file('image')){
            Storage::disk('public')->delete($post->image);
            $path = $request->file('image')->store('post', 'public');
            $updatedPost = $request->validated();
            $updatedPost['image'] = $path;
            $post->update($updatedPost);
            return redirect()->route('blog.index')->with('ok', 'Publication modifier');
        }
        $post->update($request->validated());
        return redirect()->route('blog.index')->with('ok', 'Publication modifier');
    }


    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return redirect()->route('blog.index')->with('ok', 'Publication supprimer');
    }



    public function edit(Post $post)
    {
        return view('blog.edit', compact('post'));
    }
}

