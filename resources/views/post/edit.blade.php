@extends('layouts.app')

@section('content')

    <h1 class="text-4xl text-center m-6">Update</h1>

    <div class="flex items-center justify-center">
        <form class="divide-y divide-gray-400 bg-blue-500 rounded px-8 pt-6 pb-8 mb-4" action="{{route('post.update',$post)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-4">
                <label class="mb-2">
                    Title:
                    <br>
                    <input class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline rounded @error('title') is-invalid @enderror" type="text" name="title" value="{{old('title',$post->title)}}">

                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </label>
            </div>
            <div class="mb-6">
                <label>
                    Content:
                    <br>
                    <textarea class="rounded @error('content') is-invalid @enderror" name="content" rows="5" cols="50">{{old('content',$post->content)}}</textarea>

                    @error('content')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </label>
            </div>

            <button type="submit" class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>

    </div>
@endsection


