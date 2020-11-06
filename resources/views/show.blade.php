@extends('layouts.app')

@section('content')

    <div class="flex items-center justify-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('/storage/'.$post->image)}}" alt="{{$post->image}}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$post->title}}</div>
                <p class="text-gray-700 text-base">
                    {{$post->content}}
                </p>
                <p class="text-gray-600">Fecha de Posteo: {{$post->created_at}}</p>
            </div>
            <div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="{{route('edit',$post)}}">Update Post</a></button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="">Delete Post</a></button>

            </div>
        </div>
    </div>


@endsection
