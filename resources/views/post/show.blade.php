@extends('layouts.app')

@section('content')

    <div class="flex items-center justify-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            @if(session()->has('succes'))
                <div class="alert alert-success">
                    {{ session()->get('succes') }}
                </div>
            @endif

            <img class="w-full" src="{{asset('/storage/'.$post->image)}}" alt="{{$post->image}}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$post->title}}</div>
                <p class="text-gray-700 text-base">
                    {{$post->content}}
                </p>
                <p class="text-gray-600">Fecha de Posteo: {{\Carbon\Carbon::now()->diffForHumans($post->created_at)}}</p>
            </div>
                @if(\Illuminate\Support\Facades\Auth::id() == $post->user->id)
                    <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2"><a href="{{route('post.edit',$post)}}">Update Post</a></button>
                        <form class="inline-block py-2 px-4 mx-1" action="{{route('post.destroy',$post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete Post</button>
                        </form>
                    </div>
                @endif
        </div>
    </div>


@endsection
