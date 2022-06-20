<?php

namespace App\Services\People;

use App\Contracts\Repositories\PersonRepository;
use App\Models\Person;

class CreatePersonService
{
    /**
     * The person repository.
     *
     * @var PersonRepository
     */
    private PersonRepository $personRepository;

    /**
     * Create a new CreatePersonService instance.
     *
     * @param PersonRepository $personRepository
     */
    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * Create a new person.
     *
     * @param array $attributes
     * @return Person
     */
    public function __invoke(array $attributes): Person
    {
        $person = new Person($attributes);

        $this->personRepository->save($person);

        return $person;
    }
}
