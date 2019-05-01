<?php

namespace MilhoAPP\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class cadastroUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('email.cadastroUsuario');
    }
}
