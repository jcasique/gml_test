@component('mail::message')
Estimado/a usuario: <strong>{{$apellidos}}, {{$nombres}}</strong>

Su registro ha sido exitoso, le damos la bienvenida a nuestro sistema.

Saludos.

<br>
<strong>{{ config('app.name') }}</strong>
@endcomponent
