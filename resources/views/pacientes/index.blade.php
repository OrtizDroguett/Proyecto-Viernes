@extends('layouts.master')
@section('content')
    <div class="mt-5" >
        <a href="{{route('pacientes.create')}}" class="btn btn-primary mb-3" >Agregar</a>
        <table class="table table-hover table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{$paciente->id}}</td>
                        <td>{{$paciente->rut}}</td>
                        <td>{{$paciente->nombre}}</td>
                        <td>{{$paciente->apellidoPaterno}} {{$paciente->apellidoMaterno}}</td>
                        <td width="152">
                            <form method="POST" action="{{route('pacientes.destroy',['paciente'=>$paciente->id])}}">
                                @csrf
                                <a href="{{route('pacientes.edit',['paciente'=>$paciente->id])}}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                <a href="{{route('pacientes.show',['paciente'=>$paciente->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script>$(document).ready( function () {
        $('#myTable').DataTable();
        } );
        $('#myTable').DataTable({
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
    </script>
@endsection