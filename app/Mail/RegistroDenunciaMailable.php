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
    public $pdfPath;
    /**
     * Create a new message instance.
     */
    public function __construct($data,$rutaAcuse)
    {
        $this->data = $data;
        $this->pdfPath = $rutaAcuse;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'FGE: Registro de Denuncia',
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
            Attachment::fromPath($this->pdfPath)
                ->as('acuse_denuncia.pdf')
                ->withMime('application/pdf'),
        ];
    }

    // public function build()
    // {
    //     // $pathToFile = $pdfPath;
    //     $pathToFile = $this->pdfPath;
    //     $display = 'Acuse_Predenuncia_.pdf';
    //     $mime = 'pdf';
    //     // $this->subject('Denuncia en Línea FGE');
    //     return $this->attach($pathToFile, ['as' => $display, 'mime' => $mime]);
    //     // $this->subject('Dedenuncia en Linea FGE');
    //     // return $this->view('email.notificacionpredenuncia');
    // }
}
