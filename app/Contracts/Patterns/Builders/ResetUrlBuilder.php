<?php

namespace App\Contracts\Patterns\Builders;

interface ResetUrlBuilder
{
    /**
     * Set token of the reset url
     *
     * @param string $token
     * @return $this
     */
    public function setToken(string $token);

    /**
     * Set email of the reset url
     *
     * @param string $token
     * @return $this
     */
    public function setEmail(string $email);

    /**
     * Retrieve the reset url
     *
     * @return string
     */
    public function get();
}
