@extends('layouts.main')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/fc-4.0.2/fh-3.2.2/r-2.2.9/sp-1.4.0/datatables.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row col-md-12">
        <div class="col-md-8">
            <h2>Lista de Usuarios</h2>
        </div>
        <div class="col-md-4">
            <a style="float: right" data-bs-toggle="modal" data-bs-target="#modals-slide-in" href="#">Parámetros</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <a href="{{route('usuarios.create')}}" class="btn btn-outline-primary">Crear Usuario</a>
        </div>
        <div class="card-body">
            <div class="card-datatable table-responsive">
                <table class="usuario-list-table table table-striped shadow-lg mt-4">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('#') }} </th>
                            <th>{{ __('Nombres') }}</th>
                            <th>{{ __('Apellidos') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Categoria') }}</th>
                            <th>{{ __('País') }}</th>
                            <th>{{ __('Celular') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->apellidos}}</td>
                                <td>{{$usuario->nombres}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->categoria->nombre}}</td>
                                <td>{{$usuario->pais}}</td>
                                <td>{{$usuario->celular}}</td>
                                <td>
                                    <form id="eliminar" action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('usuarios.edit', $usuario->id)}}" class="btn btn-outline-primary"><i class="bx bx-edit-alt"><span> Editar </span></i></a>
                                        <a class="btn btn-outline-danger delete"><i class="bx bx-trash"><span> Eliminar </span></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modals-slide-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Parámetros de Configuración</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="modal-content pt-0" action="{{ route('parametros.update', $parametro->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="correo">Correo Electrónico</label>
                                <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" placeholder="Ingrese el correo electrónico" name="correo" value="{{ old("correo", $parametro->correo) }}"/>
                                @error('correo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('usuarios.index')}}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success" style="float: right">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/usuario-index.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 5000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

        $('#modals-slide-in').on('hidden.bs.modal', function (e) {
            $(this).find('form').trigger('reset');
        })

        @if (count($errors) > 0)
            var modalForm = new bootstrap.Modal(document.getElementById('modals-slide-in'));

            modalForm.show();
        @endif
    </script>
@endsection
