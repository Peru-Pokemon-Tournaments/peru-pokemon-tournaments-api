<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The password reset url.
     *
     * @var string
     */
    public string $resetUrl;

    /**
     * Create a new message instance.
     *
     * @param  string $resetUrl
     * @return void
     */
    public function __construct(
        string $resetUrl
    ) {
        $this->resetUrl = $resetUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('mails.password-reset-created')
                    ->subject('Enlace para cambio de contraseña');
    }
}
