@extends('layouts.default')

@section('content')
    <h1>Edit Category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
