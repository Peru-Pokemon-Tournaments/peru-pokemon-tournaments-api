<?php

namespace App\Http\Controllers;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Contracts\Patterns\Builders\ResponseBuilder;

class PaginatedController extends Controller
{
    /**
     * The paginated response builder.
     *
     * @var PaginatedResponseBuilder
     */
    protected PaginatedResponseBuilder $paginatedResponseBuilder;

    /**
     * Creates a new PaginatedController instance.
     *
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        $this->paginatedResponseBuilder = $paginatedResponseBuilder;
    }
}
