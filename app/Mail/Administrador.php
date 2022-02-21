<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Administrador extends Mailable
{
    use Queueable, SerializesModels;

    protected $usuarios;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuarios)
    {
        //
        $this->usuarios = $usuarios;
        $this->subject('Usuario Registrado');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.administrador')->with(['usuarios' => $this->usuarios]);
    }
}
