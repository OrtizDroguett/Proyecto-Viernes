@extends('layouts.master')
@section('content')
<div class="align-content-center">
  <form class="mt-5" method="POST" action="{{route('notas.update',['nota'=>$nota->id])}}">
    @csrf
    @method("PUT")
    <div class="mb-3">
      <label for="form-label">Descripción</label>
      <textarea class="form-control" name="descripcion" aria-label="With textarea" >{{$nota->descripcion}}"</textarea>
    </div>
        <div class="mb-3">
            <label  class="form-label">Estado de paciente</label>
            <input  class="form-control" name="estadoPaciente" type="text" value="{{$nota->estadoPaciente}}" required>
        </div>
        <div class="mb-3">
        <label  class="form-label">Profesional</label>
        <select name="fkMedico" id="" class="form-control" required>
            <option value="" selected>Seleccione</option>
            @foreach ($medicos as $medico)
                <option {{ old('fkMedico') == $medico->id ? 'selected' : ($nota->fkMedico == $medico->id ? 'selected' : '') }} value="{{$medico->id}}">
                    {{$medico->rut}} {{$medico->nombre}} {{$medico->apellidoPaterno}} {{$medico->apellidoMaterno}}
                </option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label  class="form-label">Paciente</label>
        <select name="fkPaciente" id="" class="form-control" required>
            <option value="" selected>Seleccione</option>
            @foreach ($pacientes as $paciente)
            <option {{ old('fkPaciente') == $paciente->id ? 'selected' : ($nota->fkPaciente == $paciente->id ? 'selected' : '') }} value="{{$paciente->id}}">{{$paciente->rut}} {{$paciente->nombre}}
                {{$paciente->apellidoPaterno}} {{$paciente->apellidoMaterno}}</option>
            @endforeach
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection