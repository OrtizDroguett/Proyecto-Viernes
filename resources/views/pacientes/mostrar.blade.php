@extends('layouts.master')
@section('content')
<div class="card mt-5" style="width: 18rem;">
    <div class="card-header">
      {{$paciente->rut}}
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{$paciente->nombre}}</li>
      <li class="list-group-item">{{$paciente->apellidoPaterno}}</li>
      <li class="list-group-item">{{$paciente->apellidoMaterno}}</li>
    </ul>
  </div>
  @endsection