<?php

namespace App\Http\Controllers;

use App\Models\Population;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PopulationPublicController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $populations = Population::paginate(10);
        return Inertia::render('Populations/Index', compact('settings', 'populations'));
    }
}
