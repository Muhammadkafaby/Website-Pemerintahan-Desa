<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Government;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GovernmentController extends Controller
{
    public function index()
    {
        $governments = Government::all();
        return Inertia::render('Admin/Governments/Index', compact('governments'));
    }

    public function create()
    {
        return Inertia::render('Admin/Governments/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image',
            'history' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('governments', 'public');
        }

        Government::create($data);

        return redirect()->route('admin.governments.index');
    }

    public function edit(Government $government)
    {
        return Inertia::render('Admin/Governments/Edit', compact('government'));
    }

    public function update(Request $request, Government $government)
    {
        $data = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image',
            'history' => 'nullable',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('governments', 'public');
        }

        $government->update($data);

        return redirect()->route('admin.governments.index');
    }

    public function destroy(Government $government)
    {
        $government->delete();
        return redirect()->route('admin.governments.index');
    }
}
