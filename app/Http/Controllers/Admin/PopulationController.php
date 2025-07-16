<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Population;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PopulationController extends Controller
{
    public function index()
    {
        $populations = Population::paginate(10);
        return Inertia::render('Admin/Populations/Index', compact('populations'));
    }

    public function create()
    {
        return Inertia::render('Admin/Populations/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:populations',
            'gender' => 'required',
            'age' => 'required|integer',
            'education' => 'required',
            'occupation' => 'required',
            'religion' => 'required',
        ]);

        Population::create($data);

        return redirect()->route('admin.populations.index');
    }

    public function edit(Population $population)
    {
        return Inertia::render('Admin/Populations/Edit', compact('population'));
    }

    public function update(Request $request, Population $population)
    {
        $data = $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:populations,nik,' . $population->id,
            'gender' => 'required',
            'age' => 'required|integer',
            'education' => 'required',
            'occupation' => 'required',
            'religion' => 'required',
        ]);

        $population->update($data);

        return redirect()->route('admin.populations.index');
    }

    public function destroy(Population $population)
    {
        $population->delete();
        return redirect()->route('admin.populations.index');
    }
}
