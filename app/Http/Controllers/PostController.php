<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('post.welcome',compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePost $request)
    {
        $post = Post::create($request->all());

        $path= $request->file('image')->store('public');
        $post->image = basename($path);

        $post->save();

         return redirect()->route('post.show',$post);
    }

    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    public function edit(Post $post)
    {
       return view('post.edit',compact('post'));
    }

    public function update(UpdatePost $request,Post $post)
    {
        $post->title=$request->title;
        $post->content=$request->postContent;

        $post->save();
        return redirect()->route('post.show',$post->id);

    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('succes','Post Delete');

    }
}
