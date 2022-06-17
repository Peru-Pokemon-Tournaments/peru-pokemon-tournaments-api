<?php

namespace App\Http\Requests\Game;

use App\Rules\UniqueFieldExceptCurrent;
use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
                new UniqueFieldExceptCurrent('game', 'name'),
            ],
            'game_generation.id' => [
                'sometimes',
                'string',
                'exists:game_generations,id',
            ],
        ];
    }
}
