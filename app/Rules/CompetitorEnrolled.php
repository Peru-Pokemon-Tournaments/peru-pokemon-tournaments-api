<?php

namespace App\Rules;

use App\Services\TournamentInscription\CheckCompetitorIsEnrolledService;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class CompetitorEnrolled implements Rule, DataAwareRule
{
    /**
     * The CheckCompetitorIsEnrolledService.
     */
    private CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService;

    /**
     * All the data under validation.
     *
     * @var array
     */
    protected array $data = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        CheckCompetitorIsEnrolledService $checkCompetitorIsEnrolledService
    ) {
        $this->checkCompetitorIsEnrolledService = $checkCompetitorIsEnrolledService;
    }

    /**
     * Set the data under validation.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $tournament = request()->route('tournament');

        return !($this->checkCompetitorIsEnrolledService)(
            $tournament->id,
            $value
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validation.competitor_enrolled');
    }
}
