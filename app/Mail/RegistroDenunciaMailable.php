<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistroDenunciaMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $pdfPathAcuse;
    public $pdfPathDenuncia;
    /**
     * Create a new message instance.
     */
    public function __construct($data,$rutaAcuse,$rutaDenuncia)
    {
        $this->data = $data;
        $this->pdfPathAcuse = $rutaAcuse;
        $this->pdfPathDenuncia = $rutaDenuncia;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->data->titulo,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.notificacionpredenuncia',
        );
    }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPathAcuse)
            ->as('Acuse.pdf')
            ->withMime('application/pdf'),
        Attachment::fromPath($this->pdfPathDenuncia)
            ->as('Denuncia.pdf')
            ->withMime('application/pdf'),
        ];
    }

}
