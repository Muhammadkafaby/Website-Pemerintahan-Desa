<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $profile = VillageProfile::first();
        $latestPosts = Post::with('user')->latest()->take(3)->get();

        return Inertia::render('Welcome', compact('settings', 'profile', 'latestPosts'));
    }
}
