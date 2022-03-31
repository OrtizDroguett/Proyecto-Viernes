<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cargos.index')->with(['cargos'=>Cargo::all()->where('activo','1')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCargoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCargoRequest $request)
    {
        $cargo= Cargo::create([
            'cargo'=>request()->cargo,
            'activo'=>1,
        ],$request->validated());
        return redirect()->route('cargos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return view('cargos.mostrar')->with(['cargo'=>$cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('cargos.editar')->with(['cargo'=>$cargo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCargoRequest  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCargoRequest $request,  $cargo)
    {
        $cargo = Cargo::findorfail($cargo);
        $cargo->update($request->validated());
        return redirect()->route('cargos.index')->withSuccess("El cargo con ID {$cargo->id} ha sido editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        DB::table('cargos')
        ->where('id', $cargo->id)  // find your user by their email
        ->update(array('activo' => '0'));  // update the record in the DB. 
        return redirect()->route('cargos.index')->withSuccess("El cargo con la ID {$cargo->id} ha sido eliminado");
    }
}
