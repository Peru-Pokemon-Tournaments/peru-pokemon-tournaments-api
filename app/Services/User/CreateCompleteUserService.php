<?php

namespace App\Services\User;

use App\Contracts\Repositories\CompetitorRepository;
use App\Contracts\Repositories\PersonRepository;
use App\Contracts\Repositories\UserRepository;
use App\Models\Competitor;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateCompleteUserService
{
    /**
     * User Repository
     *
     * @var App\Contracts\Repositories\UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Competitor Repository
     *
     * @var App\Contracts\Repositories\CompetitorRepository
     */
    private CompetitorRepository $competitorRepository;

    /**
     * Person Repository
     *
     * @var App\Contracts\Repositories\PersonRepository
     */
    private PersonRepository $personRepository;

    /**
     * Create a new CreateUserService instance.
     *
     * @param  UserRepository $userRepository
     * @return void
     */
    public function __construct(
        CompetitorRepository $competitorRepository,
        PersonRepository $personRepository,
        UserRepository $userRepository
    )
    {
        $this->competitorRepository = $competitorRepository;
        $this->personRepository = $personRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Creates a new user
     *
     * @param   array $data
     * @return  User $user
     */
    public function __invoke(array $data)
    {
        $person = $this->createPerson();

        $user = $this->createUser($data, $person);

        $this->createCompetitor($data, $user);

        return $user;
    }

    /**
     * Create a new Person
     *
     * @return \App\Models\Person
     */
    private function createPerson()
    {
        $person = new Person();

        $this->personRepository->save($person);

        return $person;
    }

    /**
     * Create a new User
     *
     * @param   array $data
     * @param   \App\Models\Person
     * @return  \App\Models\User
     */
    private function createUser($data, $person)
    {
        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->person()->associate($person);

        $this->userRepository->save($user);

        return $user;
    }

    /**
     * Create a new Competitor
     *
     * @param   array $data
     * @param   \App\Models\User
     * @return  void
     */
    private function createCompetitor($data, $user)
    {
        $competitor = new Competitor();

        $competitor->nick_name = $data['name'];
        $competitor->user()->associate($user);

        $this->competitorRepository->save($competitor);
    }
}
