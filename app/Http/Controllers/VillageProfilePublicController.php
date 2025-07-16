<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VillageProfilePublicController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $profile = VillageProfile::first();
        return Inertia::render('VillageProfile/Index', compact('settings', 'profile'));
    }
}
