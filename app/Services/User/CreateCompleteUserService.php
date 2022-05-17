<?php

namespace App\Services\User;

use App\Contracts\Repositories\CompetitorRepository;
use App\Contracts\Repositories\PersonRepository;
use App\Contracts\Repositories\RoleRepository;
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
     * Role Repository
     *
     * @var App\Contracts\Repositories\RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * Create a new CreateUserService instance.
     *
     * @param CompetitorRepository $competitorRepository
     * @param PersonRepository $personRepository
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     * @return void
     */
    public function __construct(
        CompetitorRepository $competitorRepository,
        PersonRepository $personRepository,
        UserRepository $userRepository,
        RoleRepository $roleRepository
    )
    {
        $this->competitorRepository = $competitorRepository;
        $this->personRepository = $personRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Creates a new user
     *
     * @param   array $data
     * @return  User $user
     */
    public function __invoke(array $data)
    {
        $person = $this->createPerson($data);

        $user = $this->createUser($data, $person);

        $user->assignRole($this->roleRepository->getCompetitorRole())->save();

        $this->createCompetitor($data, $user);

        return $user;
    }

    /**
     * Create a new Person
     *
     * @return \App\Models\Person
     */
    private function createPerson($data)
    {
        $person = new Person();

        $person->first_name = $data['first_name'];
        $person->last_name = $data['last_name'];

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
