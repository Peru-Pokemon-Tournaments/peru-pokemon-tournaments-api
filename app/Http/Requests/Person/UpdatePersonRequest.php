<?php

namespace App\Http\Requests\Person;

use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
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
            'first_name' => ['sometimes', 'max:150'],
            'last_name' => ['sometimes', 'max:150'],
        ];
    }
}
