<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bumdes;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BumdesController extends Controller
{
    public function index()
    {
        $bumdes = Bumdes::all();
        return Inertia::render('Admin/Bumdes/Index', compact('bumdes'));
    }

    public function create()
    {
        return Inertia::render('Admin/Bumdes/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'contact' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bumdes', 'public');
        }

        Bumdes::create($data);

        return redirect()->route('admin.bumdes.index');
    }

    public function edit(Bumdes $bumde)
    {
        return Inertia::render('Admin/Bumdes/Edit', compact('bumde'));
    }

    public function update(Request $request, Bumdes $bumde)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'contact' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('bumdes', 'public');
        }

        $bumde->update($data);

        return redirect()->route('admin.bumdes.index');
    }

    public function destroy(Bumdes $bumde)
    {
        $bumde->delete();
        return redirect()->route('admin.bumdes.index');
    }
}
