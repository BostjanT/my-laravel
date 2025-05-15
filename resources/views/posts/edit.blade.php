@extends('layouts.default')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $posts->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $posts->title }}" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" required>{{ $posts->content }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
