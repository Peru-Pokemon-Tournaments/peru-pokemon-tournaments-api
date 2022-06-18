<?php

namespace App\Http\Requests\TournamentType;

use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateTournamentTypeRequest extends FormRequest
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
                'required',
                'string',
                'max:150',
                'min:1',
                'unique:tournament_types,name',
            ],
        ];
    }
}
