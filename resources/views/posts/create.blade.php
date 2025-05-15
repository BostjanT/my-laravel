@extends('layouts.default')

@section('content')
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="w-full" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <div">
            <label for="fotografija">Fotografija</label>
            <input type="file" name="fotografija" id="fotografija" accept="image/*" required>
            </div>
            <button type="submit">Create</button>
    </form>
@endsection
