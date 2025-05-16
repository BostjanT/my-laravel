@php use Illuminate\Support\Str; @endphp
@extends('layouts.default')

@section('header')
    <h2>THIS IS MY FIRST LARAVEL PROJECT</h2>
@endsection

@section('content')
    <div class="container">
        <h1>Zadnje tri objave</h1>
        <div class="flex gap-8 mb-2">

            <a href="{{ route('posts.create') }}">Ustvari novo objavo</a>
            <a href="{{ route('categories.create') }}">Ustvari novo kategorijo</a>
        </div>
        @foreach ($latestPosts as $post)
            <div>
                <div class="post">
                    <h2>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </h2>
                    <p><strong>Kategorija:</strong> {{ $post->category?->name ?? 'Ni določena' }}</p>
                    <p>{{ Str::limit($post->content, 150) }}</p>
                    <img src="{{ asset('storage/' . $post->fotografija) }}" alt="Post image" class="max-w-md rounded-lg">
                </div>
        @endforeach
        <div class="category">

            <h2>Kategorije</h2>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        {{ $category->name }} ({{ $category->posts_count }} objav)
                    </li>
                @endforeach
            </ul>
        </div>

        <h1>Pridobi IP naslov</h1>

        <form id="ip-form">
            <label for="ip-input">Vnesi IP naslov:</label>
            <input type="text" id="ip-input" name="ip" required>
            <button type="submit">Pridobi podatke</button>
        </form>


        @include('components.ip-table')
    </div>


    <hr>


    </div>
@endsection
