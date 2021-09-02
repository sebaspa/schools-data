@extends('adminlte::page')
@section('title', 'Usuarios')

@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-user-plus mr-1"></i> Crear usuario</a>
    <h1>Listado de usuarios</h1>
@stop

@section('content')
    <div class="card-body">
        <table class="table table-striped" id="table-users">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Incorporación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'last_name',
                    name: 'last_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    </script>
@stop
