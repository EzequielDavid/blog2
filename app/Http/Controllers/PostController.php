<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $path= $request->file('image')->store('public');
        $post = Post::create($request->all());

        $post->image = basename($path);
        $post->user_id = Auth::user()->id;

        $post->save();

         return redirect()->route('post.show',$post)->with('succes','The post has been succefull posted ');
    }

    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    public function edit(Post $post)
    {
        $userId = Auth::id();
         if($userId == $post->user->id)
         {
             return view('post.edit',compact('post'));
         }
       else
           {
               return redirect()->back()->with('succes','No esta autorizado a editar este post');
           }
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
