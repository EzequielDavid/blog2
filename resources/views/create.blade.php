@extends('layouts.app')

@section('content')

    <h1 class="text-xl text-center m-6">Create</h1>

    <div class="flex items-center justify-center">
        <form class="divide-y divide-gray-400 bg-blue-500 rounded px-8 pt-6 pb-8 mb-4" action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="mb-2">
                    Title:
                    <br>
                <input class="w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="title">
                </label>
            </div>
            <div class="mb-6">
                <label>
                    Content:
                    <br>
                    <textarea name="postContent" rows="5"></textarea>
                </label>
            </div>

            <div class="mb-6">
                <label>
                    image:
                    <br>
                    <input type="file" name="image">
                </label>
            </div>
                <br>
            <div class="mb-6">
                <label>
                    category:
                    <br>
                    <input type="text" name="category">
                </label>
            </div>
                <button type="submit" class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send</button>
        </form>

    </div>
@endsection

