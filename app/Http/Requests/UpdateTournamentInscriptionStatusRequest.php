<?php

namespace App\Http\Requests;

use App\Models\TournamentInscription;
use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTournamentInscriptionStatusRequest extends FormRequest
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
            'status' => ['required', 'string', Rule::in([
                TournamentInscription::ACCEPTED,
                TournamentInscription::PENDING,
                TournamentInscription::REJECTED,
            ])],
        ];
    }
}
