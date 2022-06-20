<?php

namespace App\Http\Controllers\People;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Person\CreatePersonRequest;
use App\Http\Resources\Person\PersonResource;
use App\Services\People\CreatePersonService;
use Illuminate\Http\Response;

class CreatePersonController extends BasicController
{
    /**
     * The CreatePersonService.
     *
     * @var CreatePersonService
     */
    private CreatePersonService $createPersonService;

    /**
     * Create a new CreatePersonController instance.
     *
     * @param CreatePersonService $createPersonService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        CreatePersonService $createPersonService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->createPersonService = $createPersonService;
    }

    /**
     * Create person.
     *
     * @param CreatePersonRequest $request
     * @return Response
     */
    public function __invoke(CreatePersonRequest $request): Response
    {
        $person = ($this->createPersonService)($request->validated());

        return $this->responseBuilder
            ->setMessage(trans('endpoints.people.create_person.created'))
            ->setResource('person', PersonResource::make($person))
            ->setStatusCode(Response::HTTP_CREATED)
            ->get();
    }
}
