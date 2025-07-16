<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $posts = Post::with('user')->latest()->paginate(10);
        return Inertia::render('Posts/Index', compact('settings', 'posts'));
    }

    public function show(Post $post)
    {
        $settings = Setting::all()->pluck('value', 'key');
        return Inertia::render('Posts/Show', compact('settings', 'post'));
    }
}
