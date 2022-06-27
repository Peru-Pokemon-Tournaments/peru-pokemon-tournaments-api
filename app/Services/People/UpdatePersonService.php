<?php

namespace App\Services\People;

use App\Contracts\Repositories\PersonRepository;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;

class UpdatePersonService
{
    /**
     * The person repository.
     *
     * @var PersonRepository
     */
    private PersonRepository $personRepository;

    /**
     * Create a new UpdatePersonService instance.
     *
     * @param PersonRepository $personRepository
     */
    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * Update a person.
     *
     * @param Person|string $person
     * @param array $attributes
     * @return Person|Model
     */
    public function __invoke($person, array $attributes): Person
    {
        $personId = $person;

        if ($person instanceof Person) {
            $personId = $person->id;
        }

        $this->personRepository->update($personId, $attributes);

        return $this->personRepository->findOne($personId);
    }
}
