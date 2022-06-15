<?php

namespace App\Http\Requests\GameGeneration;

use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateGameGenerationRequest extends FormRequest
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
            'generation' => ['required', 'integer', 'max:99', 'min:1', 'unique:game_generations,generation'],
            'description' => ['required', 'string'],
        ];
    }
}
