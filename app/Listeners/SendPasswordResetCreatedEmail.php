<?php

namespace App\Listeners;

use App\Contracts\Patterns\Builders\ResetUrlBuilder;
use App\Events\PasswordResetCreated;
use App\Mail\PasswordResetCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetCreatedEmail
{
    /**
     * The reset url builder
     *
     * @var \App\Contracts\Patterns\Builders\ResetUrlBuilder
     */
    public ResetUrlBuilder $resetUrlBuilder;

    /**
     * Create the event listener.
     *
     * @param  \App\Contracts\Patterns\Builders\ResetUrlBuilder $resetUrlBuilder
     * @return void
     */
    public function __construct(
        ResetUrlBuilder $resetUrlBuilder
    )
    {
        $this->resetUrlBuilder = $resetUrlBuilder;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PasswordResetCreated $event
     * @return void
     */
    public function handle(PasswordResetCreated $event)
    {
        $resetUrl = $this->resetUrlBuilder
            ->setEmail($event->passwordReset->user->email)
            ->setToken($event->passwordReset->token)
            ->get();

        Mail::to($event->passwordReset->user->email)
            ->send(new PasswordResetCreatedMail($resetUrl));
    }
}
