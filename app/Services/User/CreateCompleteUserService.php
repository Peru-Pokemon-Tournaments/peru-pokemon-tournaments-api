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
     * User Repository.
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Competitor Repository.
     *
     * @var CompetitorRepository
     */
    private CompetitorRepository $competitorRepository;

    /**
     * Person Repository.
     *
     * @var PersonRepository
     */
    private PersonRepository $personRepository;

    /**
     * Role Repository.
     *
     * @var RoleRepository
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
    ) {
        $this->competitorRepository = $competitorRepository;
        $this->personRepository = $personRepository;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Creates a new user.
     *
     * @param array $data
     * @return User $user
     */
    public function __invoke(array $data): User
    {
        $person = $this->createPerson($data);

        $user = $this->createUser($data, $person);

        $user->assignRole($this->roleRepository->getCompetitorRole())->save();

        $this->createCompetitor($data, $user);

        return $user;
    }

    /**
     * Create a new Person.
     *
     * @param array $data
     * @return Person
     */
    private function createPerson(array $data): Person
    {
        $person = new Person();

        $person->first_name = $data['first_name'];
        $person->last_name = $data['last_name'];

        $this->personRepository->save($person);

        return $person;
    }

    /**
     * Create a new User.
     *
     * @param array $data
     * @param Person $person
     * @return User
     */
    private function createUser(array $data, Person $person): User
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
     * Create a new Competitor.
     *
     * @param array $data
     * @param User $user
     * @return void
     */
    private function createCompetitor(array $data, User $user): void
    {
        $competitor = new Competitor();

        $competitor->nick_name = $data['name'];
        $competitor->user()->associate($user);

        $this->competitorRepository->save($competitor);
    }
}
