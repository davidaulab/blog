<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public string $consulta;
    public string $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $consulta, string $email)
    {
        $this->consulta = $consulta;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from ($this->email, 'Prueba')
                ->subject ("Formulario de contacto")
                ->markdown('emails.contact');
    }
}
