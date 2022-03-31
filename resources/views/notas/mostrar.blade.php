@extends('layouts.master')
@section('content')
<div class="card mt-5" style="width: 18rem;">
    <div class="card-header">
      {{$nota->descripcion}}
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{$nota->estadoPaciente}}</li>
      <li class="list-group-item">{{$nota->medico->nombre}} {{$nota->medico->apellidoPaterno}} {{$nota->medico->apellidoMaterno}}</li>
      <li class="list-group-item">{{$nota->paciente->nombre}} {{$nota->paciente->apellidoPaterno}} {{$nota->paciente->apellidoMaterno}}</li>
    </ul>
  </div>
  @endsection