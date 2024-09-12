<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoRecibido extends Mailable
{
    use Queueable, SerializesModels;

    private $contacto;

    /**
     * Create a new message instance.
     */
    public function __construct($contacto)
    {
        $this->contacto = $contacto;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('taracenacarlos@umes.edu.gt', 'Formulario de Contacto'), 
            to: [new Address($this->contacto['email'], $this->contacto['nombre'])],
            replyTo: [new Address('barqueromauricio@umes.edu.gt', 'Luis')],
            // Usamos la traducción para el asunto
            subject: __('messages.message_received'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contactado',
            // Pasamos la variable nombre a la vista
            with: ['nombre' => $this->contacto['nombre']],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
