<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Application $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->application->email],
            subject: '[Application] ' . $this->application->first_name . ' ' . $this->application->last_name,
        );
    }

    public function content(): Content
    {
        return new Content(view: 'mail.application');
    }
}
