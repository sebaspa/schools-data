@extends('adminlte::page')
@section('title', 'Usuarios')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
    <table class="table table-striped" id="table-users">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Incorporación</th>
            </tr>
        </thead>
    </table>
@stop

@section('js')
    <script>
        $("#table-users").DataTable({
            language: {
                "lengthMenu": "Mostrar _MENU_ resultados por página",
                "zeroRecords": "No se ha encontrado nada",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtado de _MAX_ registros totales)",
                "search": "Buscar",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.get') }}",
            columns: [{
                    data: 'name'
                },
                {
                    data: 'last_name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'created_at'
                },
            ]
        });
    </script>
@stop
