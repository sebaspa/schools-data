@extends('adminlte::page')
@section('title', 'Auditoria')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Listado de la auditoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-audit">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>Evento</th>
                            <th>Descripción</th>
                            <th>Causante</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $("#table-audit").DataTable({
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
            "order": [0, 'desc'],
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: "{{ route('audit.get') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false
                },
                {
                    data: 'log_name',
                    name: 'log_name'
                },
                {
                    data: 'event',
                    name: 'event'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'causer',
                    name: 'causer',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    searchable: false
                },
            ]
        });
    </script>
@stop
