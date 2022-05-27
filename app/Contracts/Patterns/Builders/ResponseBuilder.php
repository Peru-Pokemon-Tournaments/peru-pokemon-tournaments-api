<?php

namespace App\Contracts\Patterns\Builders;

use Illuminate\Http\Response;

interface ResponseBuilder
{
    /**
     * Set the response message.
     *
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message): self;

    /**
     * Set the response status code.
     *
     * @param int $code
     * @return $this
     */
    public function setStatusCode(int $code): self;

    /**
     * Set single resource.
     *
     * @param string $name
     * @param object $resource
     * @return $this
     */
    public function setResource(string $name, object $resource): self;

    /**
     * Set iterable resource
     *
     * @param string $name
     * @param iterable $resources
     * @return $this
     */
    public function setResources(string $name, iterable $resources): self;

    /**
     * Retrieve the built response
     *
     * @return Response
     */
    public function get(): Response;
}
