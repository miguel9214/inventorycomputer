<?php

namespace App\Http\Controllers;

use App\Models\Dependencies;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DependenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dependencies = Dependencies::all();

        return Inertia::render('Dependencies/Index',['dependencies'=>$dependencies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dependencies/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate(['name'=> 'required|max:100']);
        $dependencies = new Dependencies($request->input());
        $dependencies->save();
        return redirect('dependencies');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dependencies $dependencies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dependencies $dependencies)
    {
        return Inertia::render('Dependencies/Edit',['dependencies'=>$dependencies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dependencies $dependencies)
    {
        $request ->validate(['name'=> 'required|max:100']);
        $dependencies->update($request->all());
        return redirect('dependencies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dependencies $dependencies)
    {
        $dependencies->delete();
        return redirect('dependencies');
    }
}
