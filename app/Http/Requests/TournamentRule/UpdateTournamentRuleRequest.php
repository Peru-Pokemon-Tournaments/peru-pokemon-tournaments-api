<?php

namespace App\Http\Requests\TournamentRule;

use App\Rules\UniqueFieldExceptCurrent;
use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTournamentRuleRequest extends FormRequest
{
    use FailedValidationResponse;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'sometimes',
                'string',
                'max:150',
                'min:1',
                new UniqueFieldExceptCurrent('tournamentRule', 'name'),
            ],
            'description' => [
                'sometimes',
                'string',
                'min:1',
                'max:65535',
            ],
        ];
    }
}
