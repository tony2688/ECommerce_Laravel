<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeCustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public User $user
    ) {
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->subject('¡Bienvenido a WebinizaDev Shop!')
            ->markdown('emails.auth.welcome');
    }
}
