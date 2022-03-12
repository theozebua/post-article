<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PreviewController extends Controller
{
    public function index(): View
    {
        return view('preview.index', [
            'title' => 'Preview',
            'posts' => Post::with(['category'])->where('status', 'Publish')->latest()->paginate(8)
        ]);
    }

    public function show(Post $post): View
    {
        return view('preview.show', [
            'title' => 'Preview',
            'post' => $post
        ]);
    }
}
