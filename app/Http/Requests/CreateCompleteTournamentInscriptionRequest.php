<?php

namespace App\Http\Requests;

use App\Rules\CompetitorEnrolled;
use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompleteTournamentInscriptionRequest extends FormRequest
{
    use FailedValidationResponse;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(
        CompetitorEnrolled $competitorEnrolled
    )
    {
        return [
            'pokemon_showdown_team_export' => 'required|string',
            'competitor_id' => ['required', 'exists:competitors,id', $competitorEnrolled],
        ];
    }
}
