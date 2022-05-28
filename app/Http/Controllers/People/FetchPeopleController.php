<?php

namespace App\Http\Controllers\People;

use App\Contracts\Patterns\Builders\PaginatedResponseBuilder;
use App\Http\Controllers\PaginatedController;
use App\Http\Requests\Person\FetchPeopleRequest;
use App\Http\Resources\Person\PersonResource;
use App\Services\People\FetchPeopleService;
use Illuminate\Http\Response;

class FetchPeopleController extends PaginatedController
{
    /**
     * The fetch people service.
     *
     * @var FetchPeopleService
     */
    private FetchPeopleService $fetchPeopleService;

    /**
     * Creates a new FetchPeopleController instance.
     *
     * @param FetchPeopleService $fetchPeopleService
     * @param PaginatedResponseBuilder $paginatedResponseBuilder
     */
    public function __construct(
        FetchPeopleService $fetchPeopleService,
        PaginatedResponseBuilder $paginatedResponseBuilder
    ) {
        parent::__construct($paginatedResponseBuilder);
        $this->fetchPeopleService = $fetchPeopleService;
    }

    /**
     * Retrieve all people paginated.
     *
     * @param FetchPeopleRequest $request
     * @return Response
     */
    public function __invoke(FetchPeopleRequest $request): Response
    {
        $peoplePaginated = ($this->fetchPeopleService)(
            $request->query('page', 1),
            $request->query('pageSize', 15)
        );

        return $this->paginatedResponseBuilder
            ->setMessage(trans('endpoints.people.fetch_people.ok'))
            ->setResources('people', PersonResource::collection($peoplePaginated))
            ->setLengthAwarePaginator($peoplePaginated)
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
