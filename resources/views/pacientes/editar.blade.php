@extends('layouts.master')
@section('content')
<form class="mt-5" method="POST" action="{{route('pacientes.update',['paciente'=>$paciente->id])}}">
    @csrf
    @method("PUT")
    <div class="mb-3">
      <label  class="form-label">Rut</label>
      <input  class="form-control" name="rut" value="{{$paciente->rut}}" required>
    </div>
    <div class="mb-3">
        <label  class="form-label">Nombre</label>
        <input  class="form-control" name="nombre" type="text" value="{{$paciente->nombre}}" required>
      </div>
      <div class="mb-3">
        <label  class="form-label">Apellido Paterno</label>
        <input  class="form-control"  name="apellidoPaterno" type="text" value="{{$paciente->apellidoPaterno}}" required>
      </div>
      <div class="mb-3">
        <label  class="form-label">Apellido Materno</label>
        <input  class="form-control"  name="apellidoMaterno" type="text" value="{{$paciente->apellidoMaterno}}" required>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection