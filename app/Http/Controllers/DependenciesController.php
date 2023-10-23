<?php

namespace App\Http\Controllers;

use App\Models\Dependencies;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DependenciesController extends Controller
{
    public function index()
    {
        $dependencies = Dependencies::all();
        return Inertia::render('Dependencies/Index',['dependencies' => $dependencies]);
    }

    public function create()
    {
        return Inertia::render('Dependencies/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:100']);
        $dependencies = new Dependencies($request->input());
        $dependencies->save();
        return redirect('dependencies');
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
        $request->validate(['name' => 'required|max:100']);
        $dependencies->update($request->all());
        return redirect('depenedencies');
    }
    public function destroy(Dependencies $dependencies)
    {
        $dependencies->delete();
        return redirect('dependencies');
    }
}
