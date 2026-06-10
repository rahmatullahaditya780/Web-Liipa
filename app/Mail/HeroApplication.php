<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HeroApplication extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[The Heroes] Pengajuan kemitraan dari '.$this->data['name'],
            replyTo: [new Address($this->data['email'], $this->data['name'])],
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'mail.hero-application', with: ['data' => $this->data]);
    }
}
