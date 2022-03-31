<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*return view('medicos.index')->with(['medicos'=>$medicos = DB::table('medicos')
        ->join('cargos', 'medicos.fkCargo', '=', 'cargos.id')
        ->select('medicos.*', 'cargos.cargo')
        ->get()
        ->where('activo','1')]);*/
        return view('medicos.index')->with(['medicos'=>Medico::all()->where('activo','1')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        return view('medicos.crear')->with(['cargos'=>$cargos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicoRequest $request)
    {
        $medico= Medico::create([
            'rut'=>request()->rut,
            'nombre'=>request()->nombre,
            'apellidoPaterno'=>request()->apellidoPaterno,
            'apellidoMaterno'=>request()->apellidoMaterno,
            'activo'=>1,
            'fkCargo'=>request()->fkCargo,
        ],$request->validated());
        return redirect()->route('medicos.index')->withSuccess("El medico con la ID {$medico->id} ha sido creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        return view('medicos.mostrar')->with(['medico'=>$medico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        $cargos = Cargo::all();
        return view('medicos.editar')->with(['medico'=>$medico,'cargos'=>$cargos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicoRequest  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicoRequest $request, $medico)
    {
        $medico = Medico::findorfail($medico);
        $medico->update($request->validated());
        return redirect()->route('medicos.index')->withSuccess("El medico con ID {$medico->id} ha sido editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        DB::table('medicos')
        ->where('id', $medico->id)  // find your user by their email
        ->update(array('activo' => '0'));  // update the record in the DB. 
        return redirect()->route('medicos.index')->withSuccess("El medico con la ID {$medico->id} ha sido eliminado");
    }
}
