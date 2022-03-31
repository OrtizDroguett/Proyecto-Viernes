@extends('layouts.master')
@section('content')

    <div class="mt-5">
        <a href="{{route('notas.create')}}" class="btn btn-primary mb-3">Agregar</a>
        <table  class="table table-hover table-bordered table-striped" id="myTable"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Estado de paciente</th>
                    <th>Paciente</th>
                    <th>Medico</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    <tr>
                        <td>{{$nota->id}}</td>
                        <td>{{$nota->descripcion}}</td>
                        <td>{{$nota->estadoPaciente}}</td>
                        <td>{{$nota->paciente->nombre}} {{$nota->paciente->apellidoPaterno}} {{$nota->paciente->apellidoMaterno}}</td>
                        <td>{{$nota->medico->nombre}} {{$nota->medico->apellidoPaterno}} {{$nota->medico->apellidoMaterno}}</td>
                        <td width="152">
                            <form method="POST" action="{{route('notas.destroy',['nota'=>$nota->id])}}">
                                @csrf
                                <a href="{{route('notas.edit',['nota'=>$nota->id])}}" class=" btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                <a href="{{route('notas.show',['nota'=>$nota->id])}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
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
    <script>
     
        /*
        var txtNombreFiltrado = document.getElementById("txtNombreFiltrado");
        txtNombreFiltrado.onkeyup = function () {
            $("#frmFiltro").trigger("submit")
        }
        function Agregar() {
            document.getElementById("Titulo").value = 1;
            document.getElementById("nombreusuario").value = "";
            document.getElementById("contra").value = "";
            document.getElementById("iid").value = "";
            document.getElementById("iidrol").value = "";
        }
        var iid = document.getElementById("iid");
        iid.onchange = function () {
            document.getElementById("nombrePersona").value = iid.options[iid.selectedIndex].text;
    
        }
        function Guardar(Resultado) {
            if (Resultado >= 1) {
                $("#frmFiltro").trigger("submit")
                alert("Se ha guardado con exito");
                document.getElementById("btnCerrar").click();
            } else {
                alert("Ha ocurrido un error");
            }
        }
    </script>
@endsection