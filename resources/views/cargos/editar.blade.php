@extends('layouts.master')
@section('content')
<div class="align-content-center">
  <form class="mt-5" method="POST" action="{{route('cargos.update',['cargo'=>$cargo->id])}}">
    @csrf
    @method("put")
    <div class="mb-3">
        <label  class="form-label">Nombre</label>
        <input  class="form-control" name="cargo" type="text" value="{{$cargo->nombre}}" required>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection