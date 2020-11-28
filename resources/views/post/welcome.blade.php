
@extends('layouts.app')

@section('content')
<h1 class="text-center m-6 text-4xl">Ultimos Post</h1>
<div class="divide-y divide-gray-400 text-center">
    @if(session()->has('succes'))
        <div class="alert alert-success">
            {{ session()->get('succes') }}
        </div>
    @endif
    <div class="container text-center">
        @foreach($posts as $post)
            <div class="row m-3">
                <a href="{{route('post.show',$post->id)}}" class="no-underline col-12">{{$post->title}}</a>
                <span class="text-gray-600 col-12">{{\Carbon\Carbon::now('America/Argentina/Buenos_Aires')->diffForHumans($post->created_at)}}</span>
            </div>

        @endforeach
            <div class="w-75 m-auto ">{{$posts->links()}}</div>
    </div>
</div>
@endsection
