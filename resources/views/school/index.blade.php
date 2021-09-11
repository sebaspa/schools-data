@extends('adminlte::page')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('title', 'Escuelas')

@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{ route('schools.create') }}" class="btn btn-sm btn-secondary float-right"><i
            class="fas fa-user-plus mr-1"></i>
        Crear escuela
    </a>
    <h1>Listado de escuelas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
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
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: "{{ route('schools.get') }}",
            columns: [{
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
                    data: 'phone',
                    name: 'phone'
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
                text: "Se va a eliminar una escuela",
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
                                    text: "No se ha podido eliminar la escuela.",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    text: "Escuela eliminada correctamente.",
                                });

                            }
                        },
                        error: function(error) {
                            Swal.fire({
                                type: 'error',
                                text: "No se ha podido eliminar la escuela.",
                            });
                            console.error(error);
                        }
                    });
                }
            })
        });
    </script>
@stop
