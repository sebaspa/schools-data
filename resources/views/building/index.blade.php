@extends('adminlte::page')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('title', 'Construcciones')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('buildings.create') }}" class="btn btn-sm btn-secondary float-right"><i
            class="fas fa-user-cog mr-1"></i>
        Crear construcción
    </a>
    <h1>Construcciones</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Construccion</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buildings as $building)
                        <tr>
                            <td>{{ $building->id }}</td>
                            <td>{{ $building->name }}</td>
                            <td>{{ $building->description ? $building->description : 'No hay descripción.' }}</td>
                            <td width="130">
                                <div class="d-flex">
                                    <a href="{{ route('buildings.edit', $building) }}" class="mx-1 btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" data-id="{{ $building->id }}"
                                        class="mx-1 btn btn-xs btn-danger btn-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <p>No se encontraron resultados.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mx-3">
            {{ $buildings->onEachSide(5)->links() }}
        </div>
    </div>
@stop

@section('js')
    <script>
        var token = $("meta[name='csrf-token']").attr("content");

        $(".btn-delete").on("click", function() {
            let id = $(this).data("id");
            Swal.fire({
                type: 'warning',
                title: 'Estas seguro?',
                text: "Se va a eliminar una construcción",
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "buildings/" + id,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.errors) {
                                Swal.fire({
                                    type: 'danger',
                                    text: "No se ha podido eliminar la construcción.",
                                });
                            } else {
                                Swal.fire({
                                    type: 'success',
                                    text: "Construcción eliminada correctamente.",
                                }).then(() => {
                                    location.reload();
                                });

                            }
                        },
                        error: function(error) {
                            Swal.fire({
                                type: 'error',
                                text: "No se ha podido eliminar la construcción.",
                            });
                            console.error(error);
                        }
                    });
                }
            })
        });
    </script>
@endsection
