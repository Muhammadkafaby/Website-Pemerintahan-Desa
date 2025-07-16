<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicationController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $publications = Publication::with('user')->latest()->paginate(10);
        return Inertia::render('Publications/Index', compact('settings', 'publications'));
    }
}
