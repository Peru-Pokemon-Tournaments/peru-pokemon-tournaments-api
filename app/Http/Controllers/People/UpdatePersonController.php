<?php

namespace App\Http\Controllers\People;

use App\Contracts\Patterns\Builders\ResponseBuilder;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Person\UpdatePersonRequest;
use App\Http\Resources\Person\PersonResource;
use App\Models\Person;
use App\Services\People\UpdatePersonService;
use Illuminate\Http\Response;

class UpdatePersonController extends BasicController
{
    /**
     * The UpdatePersonService.
     *
     * @var UpdatePersonService
     */
    private UpdatePersonService $updatePersonService;

    /**
     * Create a new UpdatePersonController instance.
     *
     * @param UpdatePersonService $updatePersonService
     * @param ResponseBuilder $responseBuilder
     */
    public function __construct(
        UpdatePersonService $updatePersonService,
        ResponseBuilder $responseBuilder
    ) {
        parent::__construct($responseBuilder);
        $this->updatePersonService = $updatePersonService;
    }

    /**
     * Update person.
     *
     * @param Person $person
     * @param UpdatePersonRequest $request
     * @return Response
     */
    public function __invoke(Person $person, UpdatePersonRequest $request): Response
    {
        $person = ($this->updatePersonService)(
            $person,
            $request->validated()
        );

        return $this->responseBuilder
            ->setMessage(trans('endpoints.people.update_person.ok'))
            ->setResource('person', PersonResource::make($person))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
