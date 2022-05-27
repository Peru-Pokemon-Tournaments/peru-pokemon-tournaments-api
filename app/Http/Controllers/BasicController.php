<?php

namespace App\Http\Controllers;

use App\Contracts\Patterns\Builders\ResponseBuilder;

class BasicController extends Controller
{
    /**
     * The response builder.
     *
     * @var ResponseBuilder
     */
    protected ResponseBuilder $responseBuilder;

    /**
     * Creates a new BasicController instance.
     *
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        ResponseBuilder $responseBuilder
    ) {
        $this->responseBuilder = $responseBuilder;
    }
}
