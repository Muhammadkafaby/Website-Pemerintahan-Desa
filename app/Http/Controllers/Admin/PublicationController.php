<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::with('user')->latest()->paginate(10);
        return Inertia::render('Admin/Publications/Index', compact('publications'));
    }

    public function create()
    {
        return Inertia::render('Admin/Publications/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'required|file',
        ]);

        $data['user_id'] = auth()->id();
        $data['file'] = $request->file('file')->store('publications', 'public');

        Publication::create($data);

        return redirect()->route('admin.publications.index');
    }

    public function edit(Publication $publication)
    {
        return Inertia::render('Admin/Publications/Edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|file',
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('publications', 'public');
        }

        $publication->update($data);

        return redirect()->route('admin.publications.index');
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('admin.publications.index');
    }
}
