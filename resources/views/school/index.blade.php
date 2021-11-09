@extends('adminlte::page')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('title', 'Escuelas')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('schools.export') }}" class="btn btn-success mb-3"><i class="fas fa-file-excel mr-2"></i> Exportar</a>
        </div>
        <div class="col-12 col-md-6">
            <h1>Listado de filiaciónes</h1>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{ route('schools.create') }}" class="btn btn-sm btn-danger float-right">
                <i class="fas fa-user-plus mr-1"></i>
                Crear filiación
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        var token = $("meta[name='csrf-token']").attr("content");

        $("#table").DataTable({
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
            "order": [4, 'desc'],
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: "{{ route('schools.get') }}",
            columns: [{
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    visible: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $("body").on("click", ".btn-delete", function() {
            let id = $(this).data("id");
            Swal.fire({
                type: 'warning',
                title: 'Estas seguro?',
                text: "Se va a eliminar una filiación",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "schools/" + id,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        dataType: "json",
                        success: function(response) {
                            $("#table").DataTable().ajax.reload();
                            if (response.errors) {
                                Swal.fire({
                                    type: 'danger',
                                    text: "No se ha podido eliminar la filiación.",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    text: "Filiación eliminada correctamente.",
                                });

                            }
                        },
                        error: function(error) {
                            Swal.fire({
                                type: 'error',
                                text: "No se ha podido eliminar la filiación.",
                            });
                            console.error(error);
                        }
                    });
                }
            })
        });
    </script>
@stop
