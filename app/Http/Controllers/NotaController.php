<?php

namespace App\Http\Controllers;

use App\Models\nota;
use App\Http\Requests\StorenotaRequest;
use App\Http\Requests\UpdatenotaRequest;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*return view('notas.index')->with(['notas'=>$notas = DB::table('notas')
        ->join('medicos', 'notas.fkMedico', '=', 'medicos.id')
        ->join('pacientes', 'notas.fkPaciente', '=', 'pacientes.id')
        ->select('notas.*', 'medicos.nombreMedico','medicos.apellidoPaternoMedico',
        'medicos.apellidoMaternoMedico','pacientes.nombre','pacientes.apellidoPaterno','pacientes.apellidoMaterno')
        ->get()
        ->where('activo','1')]);*/
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('notas.index')->with(['notas'=>nota::all()->where('activo','1'),'medicos'=>$medicos,'pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('notas.crear')->with(['medicos'=>$medicos,'pacientes'=>$pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorenotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorenotaRequest $request)
    {
        $nota= nota::create([
            'descripcion'=>request()->descripcion,
            'estadoPaciente'=>request()->estadoPaciente,
            'fkPaciente'=>request()->fkPaciente,
            'fkMedico'=>request()->fkMedico,
            'activo'=>1,
        ],$request->validated());
        return redirect()->route('notas.index')->withSuccess("La nota con la ID {$nota->id} ha sido creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(nota $nota)
    {
        return view('notas.mostrar')->with(['nota'=>$nota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(nota $nota)
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('notas.editar')->with(['nota'=>$nota,'medicos'=>$medicos,'pacientes'=>$pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenotaRequest  $request
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatenotaRequest $request, $nota)
    {
        $nota = nota::findorfail($nota);
        $nota->update($request->validated());
        return redirect()->route('notas.index')->withSuccess("La nota con ID {$nota->id} ha sido editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(nota $nota)
    {
        DB::table('notas')
        ->where('id', $nota->id)  // find your user by their email
        ->update(array('activo' => '0'));  // update the record in the DB. 
        return redirect()->route('notas.index')->withSuccess("La nota con la ID {$nota->id} ha sido eliminado");
    }
}
