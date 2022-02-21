@extends('layouts.main')
@section('page-styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{route('usuarios.store')}}" method="POST">
                @csrf
                <div class="card justify-content-center">
                    <div class="card-header">
                        <h3 class="card-title">CREAR USUARIOS</h3>
                    </div>
                    <div class="card-body">
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="cedula">Cédula</label>
                                <input type="text" class="form-control @error('cedula') is-invalid @enderror" id="cedula" placeholder="Ingrese número de cédula" name="cedula" value="{{ old("cedula") }}" onkeypress="return /[0-9]/i.test(event.key)"/>
                                @error('cedula')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="apellidos">Apellidos</label>
                                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" placeholder="Ingrese el(los) apellido(s) del usuario" name="apellidos" value="{{ old("apellidos") }}" onkeypress="return /[a-z ]/i.test(event.key)"  maxlength="100"/>
                                @error('apellidos')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nombres">Nombres</label>
                                <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" placeholder="Ingrese el(los) nombre(s) del usuario" name="nombres" value="{{ old("nombres") }}" onkeypress="return /[a-z ]/i.test(event.key)" minlength="5" maxlength="100"/>
                                @error('nombres')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="email">Correo Electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Ingrese el correo electrónico del usuario" name="email" value="{{ old("email") }}" maxlength="150"/>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="celular">Celular</label>
                                <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" placeholder="Ingrese el número de teléfono del usuario" name="celular" value="{{ old("celular") }}" onkeypress="return /[0-9]/i.test(event.key)" maxlength="10"/>
                                @error('celular')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="categoria">Categoría</label>
                                <select id="categoria_id" class="select2 form-control" name="categoria_id">
                                    <option selected disabled>-- Seleccione la categoría -- </option>
                                    @foreach ($categorias as $categoria)
                                        @if(old("categoria_id") == $categoria->id)
                                            <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                                        @else
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="pais">Países</label>
                                <select id="pais" class="select2 form-control" name="pais">
                                    <option selected disabled>-- Seleccione el país -- </option>
                                    @foreach ($paises as $key => $value)
                                        @if(old("pais") == $value['country'])
                                            <option value="{{$value['country']}}" selected>{{$value['country']}}</option>
                                        @else
                                            <option value="{{$value['country']}}">{{$value['country']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="direccion">Dirección</label>
                                <textarea class="form-control @error('direccion') is-invalid @enderror" name="direccion" id="direccion" rows="2"  maxlength="180">{{old("direccion")}}</textarea>
                                @error('direccion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('usuarios.index')}}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success" style="float: right">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 5000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
@endsection
