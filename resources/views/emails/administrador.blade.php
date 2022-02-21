@component('mail::message')
Estimado administrador,

Se ha registrado un nuevo usuario en el sistema.

La distribución de usuarios por paises queda de la siguiente manera:

<table class="table table-striped shadow-lg mt-4">
    <thead class="thead-light">
        <tr>
            <th>{{ __('País') }}</th>
            <th>{{ __('Total Usuarios') }} </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->pais}}</td>
                <td>{{$usuario->total}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
Saludos.

<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
