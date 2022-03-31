@extends('layouts.master')
@section('content')
<div class="align-content-center">
  <form class="mt-5" method="POST" action="{{route('pacientes.store')}}">
    @csrf
    <div class="mb-3">
      <label  class="form-label">Rut</label>
      <input  class="form-control" name="rut" required>
    </div>
    <div class="mb-3">
        <label  class="form-label">Nombre</label>
        <input  class="form-control" name="nombre" type="text" required>
      </div>
      <div class="mb-3">
        <label  class="form-label">Apellido Paterno</label>
        <input  class="form-control"  name="apellidoPaterno" type="text" required>
      </div>
      <div class="mb-3">
        <label  class="form-label">Apellido Materno</label>
        <input  class="form-control"  name="apellidoMaterno" type="text" required>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

  @endsection