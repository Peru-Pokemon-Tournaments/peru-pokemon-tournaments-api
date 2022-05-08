<?php

namespace App\Patterns\Builders;

use App\Contracts\Patterns\Builders\ResetUrlBuilder;

class FrontendResetUrlBuilder implements ResetUrlBuilder
{
    /**
     * The token of the reset url
     *
     * @var string
     */
    private string $token;

    /**
     * The email of the reset url
     *
     * @var string
     */
    private string $email;

    /**
     * Set token of the reset url
     *
     * @param string $token
     * @return $this
     */
    public function setToken(string $token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Set email of the reset url
     *
     * @param string $token
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Retrieve the reset url
     *
     * @return string
     */
    public function get()
    {
        $parts = [];

        if ($this->token)
        {
            $parts[] = 'token=' . $this->token;
        }

        if ($this->email)
        {
            $parts[] = 'email=' . $this->email;
        }

        return config('frontend.main_app.url') . '/reset-password?' . implode('&', $parts);
    }
}
