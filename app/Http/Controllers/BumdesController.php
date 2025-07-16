<?php

namespace App\Http\Controllers;

use App\Models\Bumdes;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BumdesController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $bumdes = Bumdes::all();
        return Inertia::render('Bumdes/Index', compact('settings', 'bumdes'));
    }
}
