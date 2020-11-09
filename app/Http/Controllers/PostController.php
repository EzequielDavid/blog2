<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('welcome',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
         $request->validate
         ([
            'title'=> 'required',
            'postContent'=> 'required',
            'category'=> 'required',
            'image'=> 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->postContent;
        $post->category = $request->category;

        $path= $request->file('image')->store('public');
        $post->image = basename($path);

         $post->save();

         return redirect()->route('show',$post->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title'=>'required',
            'postContent'=>'required',
        ]);

        $post->title=$request->title;
        $post->content=$request->postContent;

        $post->save();
        return redirect()->route('show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('index')->with('succes','Post Delete');

    }
}
