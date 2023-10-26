<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;



    protected $data;


    public function __construct($data)
    {
        $this->data = $data;
    }


    public function envelope()
    {
        return new Envelope(
            from: new Address('natnaeln4d@gmail','Sagni'),
            subject: 'Reset Password',
        );
    }


    public function content()
    {
        return new Content(
            view: 'emails.reset_password',
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
