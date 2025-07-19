<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class forgotPasswordNuxt extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $subject;

    public function __construct($token, $subject)
    {
        $this->token = $token;
        $this->subject = $subject;
    }

    public function build()
    {
        return $this->view('emails.forgotPassword-nuxt')->subject($this->subject);
    }
}
