<?php

namespace App\Events;

use App\Models\PasswordReset;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PasswordResetCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The password reset.
     *
     * @var PasswordReset
     */
    public PasswordReset $passwordReset;

    /**
     * Create a new event instance.
     *
     * @param PasswordReset $passwordReset
     * @return void
     */
    public function __construct(PasswordReset $passwordReset)
    {
        $this->passwordReset = $passwordReset;
    }
}
