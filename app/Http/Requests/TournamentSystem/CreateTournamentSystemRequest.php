<?php

namespace App\Http\Requests\TournamentSystem;

use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateTournamentSystemRequest extends FormRequest
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
                'unique:tournament_systems,name',
            ],
            'description' => [
                'required',
                'string',
                'min:1',
                'max:65535',
            ],
        ];
    }
}
