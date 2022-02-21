<?php

namespace App\Observers;

use App\Models\Usuario;
use App\Mail\Usuario as MailUsuario;
use App\Mail\Administrador as MailAdministrador;
use App\Models\Parametro;
use Illuminate\Support\Facades\Mail;

class UsuarioObsever
{
    /**
     * Handle the Usuario "created" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function created(Usuario $usuario)
    {
        Mail::to($usuario->email)->send(new MailUsuario($usuario->nombres, $usuario->apellidos));

        $usuarios = Usuario::selectRaw('pais, COUNT(*) as total')->groupBy('pais')->get();
        $correo = Parametro::find(1)->value('correo');

        Mail::to($correo)->send(new MailAdministrador ($usuarios));
    }

    /**
     * Handle the Usuario "updated" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function updated(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the Usuario "deleted" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function deleted(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the Usuario "restored" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function restored(Usuario $usuario)
    {
        //
    }

    /**
     * Handle the Usuario "force deleted" event.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return void
     */
    public function forceDeleted(Usuario $usuario)
    {
        //
    }
}
