<?php

namespace App\Patterns\Builders;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use Illuminate\Http\Response;

class ApiResponseBuilder implements ResponseBuilder
{
    /**
     * The message of response.
     *
     * @var string
     */
    protected string $message;

    /**
     * The status code of response.
     *
     * @var int
     */
    protected int $statusCode;

    /**
     * The resources of the response.
     *
     * @var array
     */
    protected array $resources;

    /**
     * Creates a new ApiResponseBuilder instance.
     */
    public function __construct()
    {
        $this->resources = [];
        $this->statusCode = 200;
    }

    /**
     * Set the response message.
     *
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Set the response status code.
     *
     * @param int $code
     * @return $this
     */
    public function setStatusCode(int $code): self
    {
        $this->statusCode = $code;

        return $this;
    }

    /**
     * Set single resource.
     *
     * @param string $name
     * @param mixed $resource
     * @return $this
     */
    public function setResource(string $name, $resource): self
    {
        $this->resources[$name] = $resource;

        return $this;
    }

    /**
     * Set iterable resource.
     *
     * @param string $name
     * @param iterable $resources
     * @return $this
     */
    public function setResources(string $name, iterable $resources): self
    {
        $this->resources[$name] = $resources;

        return $this;
    }

    /**
     * Retrieve the built response.
     *
     * @return Response
     */
    public function get(): Response
    {
        $data = [];

        if ($this->message) {
            $data['message'] = $this->message;
        }

        foreach ($this->resources as $key => $resource) {
            $data[$key] = $resource;
        }

        return response($data, $this->statusCode);
    }
}
