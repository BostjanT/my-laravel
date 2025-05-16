<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'fotografija' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('fotografija')) {
            $path = $request->file('fotografija')->store('images', 'public');
            $validated['fotografija'] = $path; 
        
}
        Posts::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posts = Posts::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $posts = Posts::findOrFail($id);
        $posts->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posts = Posts::findOrFail($id);
        $posts->delete();

        return redirect()->route('posts.index')->with('success', 'Post was deleted!');
    }

    public function home()
{
    $latestPosts = Posts::with('category')
                        ->latest()
                        ->take(3)
                        ->get();

    $categories = Categories::withCount('posts')->get();

    return view('home', compact('latestPosts', 'categories'));
}
}
