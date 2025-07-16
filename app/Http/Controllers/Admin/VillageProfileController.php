<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VillageProfileController extends Controller
{
    public function index()
    {
        $profile = VillageProfile::first();
        return Inertia::render('Admin/VillageProfile/Index', compact('profile'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        VillageProfile::updateOrCreate(['id' => 1], $data);

        return redirect()->route('admin.village-profile.index');
    }
}
