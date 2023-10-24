<?php

namespace App\Http\Controllers;

use App\Models\Dependencies;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DependenciesController extends Controller
{
    public function index()
    {
        return Inertia::render('Dependencies/Index',['dependencies' => Dependencies::with('user:id,name')->latest()->get()]);
    }

    public function create()
    {
        return Inertia::render('Dependencies/Create');
    }

    public function store(Request $request):RedirectResponse
    {
        $validated=$request->validate([
            'name' => 'required|max:100'
        ]);
        $request->user()->dependencies()->create($validated);

        return redirect(route('dependencies.index'));
    }
    public function show(Dependencies $dependencies)
    {
        //
    }
    public function edit(Dependencies $dependencies)
    {
        return Inertia::render('Dependencies/Edit',['dependencies' => $dependencies]);
    }
    public function update(Request $request, Dependencies $dependencies)
    {

        $this->authorize('update', $dependencies);

        $validated=$request->validate([
            'name' => 'required|max:100'
        ]);
        $dependencies->update($validated);

        return redirect(route('dependencies.index'));
    }
    public function destroy(Dependencies $dependencies)
    {
        $dependencies->delete();
        return redirect('dependencies');
    }
}
