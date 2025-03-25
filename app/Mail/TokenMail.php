<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
//

class TokenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;  // Variable para almacenar el token de acceso
    
    /**
     * Create a new message instance.
     */
    public function __construct($token)
    {
        $this->token = $token;  // Pasar el token a la clase
    }
    public function build()
    {
        return $this->subject('Tu nueva contraseña temporal')
                    ->view('emails.token');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Token Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
