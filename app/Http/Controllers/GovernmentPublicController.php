<?php

namespace App\Http\Controllers;

use App\Models\Government;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GovernmentPublicController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $governments = Government::all();
        return Inertia::render('Governments/Index', compact('settings', 'governments'));
    }
}
