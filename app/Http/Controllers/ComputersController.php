<?php

namespace App\Http\Controllers;

use App\Models\Computers;
use App\Models\Dependencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;




class ComputersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computers::select('computers.id, computers.name ,so ,ofimatica, cpu, storage, ram, ip, mac, serial, fixed_asset, anydesk,printer, scanner,dependencies_id', 'dependencies.name as dependencies')->join('dependencies', 'dependencies.id', '=', 'computers.dependencies_id')->paginate(10);

        $dependencies = Dependencies::all();

        return Inertia::render('Computers/Index', ['computers' => $computers, 'dependencies' => $dependencies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'so' => 'required|max:100',
            'ofimatica' => 'required|max:100',
            'cpu' => 'required|max:100',
            'storage' => 'required|max:100',
            'ram' => 'required|max:100',
            'ip' => 'required|max:100|unique',
            'mac' => 'required|max:100',
            'serial' => 'required|max:100',
            'fixed_asset' => 'required|max:100',
            'anydesk' => 'required|max:100',
            'printer' => 'required|max:100',
            'scanner' => 'required|max:100',
            'dependencies_id' => 'required|numeric'
        ]);

        $computers = new Computers($request->input());
        $computers->save();
        return redirect('computers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computers $computers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computers $computers)
    {

        
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computers $computers)
    {
        $request->validate([
            'name' => 'required|max:100',
            'so' => 'required|max:100',
            'ofimatica' => 'required|max:100',
            'cpu' => 'required|max:100',
            'storage' => 'required|max:100',
            'ram' => 'required|max:100',
            'ip' => 'required|max:100|unique',
            'mac' => 'required|max:100',
            'serial' => 'required|max:100',
            'fixed_asset' => 'required|max:100',
            'anydesk' => 'required|max:100',
            'printer' => 'required|max:100',
            'scanner' => 'required|max:100',
            'dependencies_id' => 'required|numeric'
        ]);
        $computers->udpate($request->input());

        return redirect('computers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computers $computers)
    {
        $computers->delete();

        return redirect('computers');
    }


    // Funcion para crear graficas 

    public function ComputersBydependencies()
    {

        $data = Computers::select(DB::raw('count(computers.id) as count, dependencies.name'))->join('dependencies', 'dependencies.id', '=', 'computers.dependencies_id')->groupBy('dependencies.name')->get();
        return Inertia::render('Computers/graphic', ['data' => $data]);
    }

    public function reports()
    {
        $computers = Computers::select('computers.id,computers.name,so,ofimatica, cpu, storage, ram, ip, mac, serial, fixed_asset, anydesk,printer, scanner,dependencies_id', 'dependencies.name as dependencies')->join('dependencies', 'dependencies.id', '=', 'computers.dependencies_id')->get();

        $dependencies = Dependencies::all();

        return Inertia::render('Computers/Reports', ['computers' => $computers, 'dependencies' => $dependencies]);
    }
}
