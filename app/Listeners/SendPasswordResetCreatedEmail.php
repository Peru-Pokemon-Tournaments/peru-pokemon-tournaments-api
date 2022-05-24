<?php

namespace App\Listeners;

use App\Contracts\Patterns\Builders\ResetUrlBuilder;
use App\Events\PasswordResetCreated;
use App\Mail\PasswordResetCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetCreatedEmail
{
    /**
     * The reset url builder.
     *
     * @var ResetUrlBuilder
     */
    public ResetUrlBuilder $resetUrlBuilder;

    /**
     * Create the event listener.
     *
     * @param ResetUrlBuilder $resetUrlBuilder
     * @return void
     */
    public function __construct(
        ResetUrlBuilder $resetUrlBuilder
    ) {
        $this->resetUrlBuilder = $resetUrlBuilder;
    }

    /**
     * Handle the event.
     *
     * @param PasswordResetCreated $event
     * @return void
     */
    public function handle(PasswordResetCreated $event): void
    {
        $resetUrl = $this->resetUrlBuilder
            ->setEmail($event->passwordReset->user->email)
            ->setToken($event->passwordReset->token)
            ->get();

        Mail::to($event->passwordReset->user->email)
            ->send(new PasswordResetCreatedMail($resetUrl));
    }
}
