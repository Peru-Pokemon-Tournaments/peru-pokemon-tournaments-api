<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\BasicController;
use App\Http\Resources\Person\PersonResource;
use App\Models\Person;
use Illuminate\Http\Response;

class GetPersonController extends BasicController
{
    /**
     * Retrieve person.
     *
     * @param Person $person
     * @return Response
     */
    public function __invoke(Person $person): Response
    {
        $person->load([
            'users',
        ]);

        return $this->responseBuilder
            ->setMessage(trans('endpoints.people.get_person.ok'))
            ->setResource('person', PersonResource::make($person))
            ->setStatusCode(Response::HTTP_OK)
            ->get();
    }
}
