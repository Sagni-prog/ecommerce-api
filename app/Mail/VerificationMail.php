<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public function envelope()
    {
        return new Envelope(
            from: new Address('sagnialemayehu69@gmail.com','Sagni'),
            subject: 'Verification Mail',
        );
    }

 
    public function content()
    {
        return new Content(
            view: 'emails.verify_user',
            with: [
                'data' => $this->data
            ]
        );
    }

    
    public function attachments()
    {
        return [];
    }
}
