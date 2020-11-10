
@extends('layouts.app')

@section('content')
<h1 class="text-center m-6 text-4xl">Ultimos Post</h1>
<div class="divide-y divide-gray-400 text-center">
    <ul class="list-none text-center">
        @foreach($posts as $post)
            <li class="text-center py-2"><a href="{{route('post.show',$post->id)}}" class="no-underline">{{$post->title}}</a></li>
            <span class="text-gray-600">{{$post->created_at}}</span>
        @endforeach
    </ul>
</div>
{{$posts->links()}}
@endsection
