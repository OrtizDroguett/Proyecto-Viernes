@extends('layouts.master')
@section('content')
<div class="align-content-center">
  <form class="mt-5" method="POST" action="{{route('notas.store')}}">
    @csrf
    <div class="mb-3">
      <label for="form-label">Descripción</label>
      <textarea class="form-control" name="descripcion" aria-label="With textarea"></textarea>
    </div>
        <div class="mb-3">
            <label  class="form-label">Estado de paciente</label>
            <input  class="form-control" name="estadoPaciente" type="text" required>
        </div>
        <div class="mb-3">
        <label  class="form-label">Profesional</label>
        <select name="fkMedico" id="" class="form-control" required>
            <option value="" selected>Seleccione</option>
            @foreach ($medicos as $medico)
            <option value="{{$medico->id}}">{{$medico->rut}} {{$medico->nombre}}
                 {{$medico->apellidoPaterno}} {{$medico->apellidoMaterno}}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label  class="form-label">Paciente</label>
        <select name="fkPaciente" id="" class="form-control" required>
            <option value="" selected>Seleccione</option>
            @foreach ($pacientes as $paciente)
            <option value="{{$paciente->id}}">{{$paciente->rut}} {{$paciente->nombre}}
                {{$paciente->apellidoPaterno}} {{$paciente->apellidoMaterno}}</option>
            @endforeach
        </select>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection