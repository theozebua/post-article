<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(): View
    {
        return view('dashboard.posts.index', [
            'title' => 'Posts',
            'posts' => Post::withTrashed()->with(['category'])->latest()->get()
        ]);
    }

    public function create(): View
    {
        return view('dashboard.posts.create', [
            'title' => 'Add new post',
            'categories' => Category::all()
        ]);
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Post::create($data);

        return to_route('posts.index')->with('message', 'Post added successfully');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post): View
    {
        return view('dashboard.posts.edit', [
            'title' => 'Edit post',
            'categories' => Category::all(),
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        Post::where('id', $post->id)->update($data);

        return to_route('posts.index')->with('message', 'Post updated successfully');
    }

    public function destroy(Post $post): RedirectResponse
    {
        DB::beginTransaction();
        Post::where('id', $post->id)->update(['status' => 'Trash']);
        $post->delete();
        DB::commit();

        return to_route('posts.index')->with('message', 'Post trashed successfully');
    }

    public function restore($id): RedirectResponse
    {
        DB::beginTransaction();
        Post::withTrashed()->where('id', $id)->update(['status' => 'Draft']);
        Post::where('id', $id)->restore();
        DB::commit();
        return to_route('posts.index')->with('message', 'Post restored successfully');
    }

    public function delete($id): RedirectResponse
    {
        Post::where('id', $id)->forceDelete();

        return to_route('posts.index')->with('message', 'Post deleted successfully');
    }
}
