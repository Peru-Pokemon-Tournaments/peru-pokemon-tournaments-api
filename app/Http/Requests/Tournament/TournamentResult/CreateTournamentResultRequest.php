<?php

namespace App\Http\Requests\Tournament\TournamentResult;

use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateTournamentResultRequest extends FormRequest
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
            'place' => ['required', 'integer'],
            'score' => ['required', 'numeric'],
            'competitor_id' => ['required', 'exists:tournament_inscriptions,competitor_id'],
        ];
    }
}
