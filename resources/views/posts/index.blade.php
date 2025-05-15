@extends('layouts.default')

@section('content')
    <h1 class="mb-4">All Posts</h1>
    <a href="{{ route('posts.create') }}" class="text-green-600 mb-2">Create New Post</a>
    <ul class="list-disc pl-5">
        @foreach ($posts as $post)
            <li class=" flex-col w-full justify-between mb-2 border-b pb-2">
                <a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a>
                <p>{{ $post->content }}</p>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ml-4">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
