@extends('layouts.default')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $posts->title }}</h1>

        @if ($posts->fotografija)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $posts->fotografija) }}" alt="Fotografija" class="w-full max-w-md rounded">
            </div>
        @endif

        <div class="mb-4 text-gray-700">
            {{ $posts->content }}
        </div>

        @if ($posts->category)
            <div class="text-sm text-gray-600">
                Kategorija: <span class="font-semibold">{{ $posts->category->name }}</span>
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline">← Nazaj na vse objave</a>
        </div>
    </div>
</div>
@endsection
