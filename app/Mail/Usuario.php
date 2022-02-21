<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Usuario extends Mailable
{
    use Queueable, SerializesModels;

    public $nombres, $apellidos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombres, $apellidos)
    {
        //
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->subject('Usuario Registrado');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.usuario');
    }
}
