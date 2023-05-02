<?php

namespace App\Http\Requests;

use App\Models\Movement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovementFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'pain'    => 'boolean',
            'urgency' => [
                'required',
                Rule::in(array_keys(Movement::URGENCY_OPTIONS))
            ],
            'rating'  => [
                'required',
                Rule::in(array_keys(Movement::BRISTOL_SCALE))
            ],
            'date'  => [
                'required',
                'date',
            ],
            'comment'  => ['string', 'max:255', 'nullable']
        ];
    }
}
