<?php

namespace App\Http\Requests;

use App\Traits\Requests\FailedValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompleteTournamentRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'place' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'end_date' => 'required|date_format:Y-m-d H:i:s',
            'created_by_person.id' => 'required|exists:people,id',
            'tournament_type.id' => 'required|exists:tournament_types,id',
            'tournament_format.id' => 'required|exists:tournament_formats,id',
            'tournament_price.symbol' => 'required|string',
            'tournament_price.amount' => 'required|numeric',
            'tournament_prizes' => 'required|array|min:1',
            'tournament_prizes.*.title' => 'required|string',
            'tournament_prizes.*.description' => 'required|string',
            'external_bracket.reference' => 'sometimes|string',
            'external_bracket.url' => 'sometimes|string',
            'tournament_image_file' => 'sometimes|file',
            'games' => 'required|array|min:1',
            'games.*.id' => 'required|exists:games,id',
            'devices' => 'required|array|min:1',
            'devices.*.id' => 'required|exists:devices,id',
            'tournament_systems' => 'required|array|min:1',
            'tournament_systems.*.id' => 'required|exists:tournament_systems,id',
            'tournament_rules' => 'required|array|min:1',
            'tournament_rules.*.id' => 'required|exists:tournament_rules,id',
        ];
    }
}
