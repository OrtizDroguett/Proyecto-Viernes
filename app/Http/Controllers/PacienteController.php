<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pacientes.index')->with(['pacientes'=>Paciente::all()->where('activo','1')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePacienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePacienteRequest $request)
    {
        $paciente= Paciente::create([
            'rut'=>request()->rut,
            'nombre'=>request()->nombre,
            'apellidoPaterno'=>request()->apellidoPaterno,
            'apellidoMaterno'=>request()->apellidoMaterno,
            'activo'=>1,
        ],$request->validated());
        return redirect()->route('pacientes.index')->withSuccess("El paciente con la ID {$paciente->id} ha sido creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.mostrar')->with(['paciente'=>$paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.editar')->with(['paciente'=>$paciente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePacienteRequest  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePacienteRequest $request,  $paciente)
    {
        
        $paciente = Paciente::findorfail($paciente);
        $paciente->update($request->validated());
        return redirect()->route('pacientes.index')->withSuccess("El paciente con ID {$paciente->id} ha sido editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        /*  */
        DB::table('pacientes')
        ->where('id', $paciente->id)  // find your user by their email
        ->update(array('activo' => '0'));  // update the record in the DB. 
        return redirect()->route('pacientes.index')->withSuccess("El paciente con la ID {$paciente->id} ha sido eliminado");
    }
}
