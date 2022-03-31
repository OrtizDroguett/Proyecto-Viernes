@extends('layouts.master')
@section('content')
<div class="card mt-5" style="width: 18rem;">
    <div class="card-header">
      {{$medico->rut}}
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{$medico->nombre}}</li>
      <li class="list-group-item">{{$medico->apellidoPaterno}}</li>
      <li class="list-group-item">{{$medico->apellidoMaterno}}</li>
    </ul>
  </div>
  @endsection