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
     * The password reset
     *
     * @var App\Models\PasswordReset
     */
    public PasswordReset $passwordReset;

    /**
     * Create a new event instance.
     *
     * @param  App\Models\PasswordReset
     * @return void
     */
    public function __construct(PasswordReset $passwordReset)
    {
        $this->passwordReset = $passwordReset;
    }
}
