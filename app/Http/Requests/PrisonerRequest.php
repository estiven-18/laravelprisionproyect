<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrisonerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:45',
            'birth_date' => 'required|date|before_or_equal:today',
            'entry_datetime' => 'required|date|after_or_equal:birth_date|before_or_equal:now',
            'crime' => 'required|string|max:45',
            'cell' => 'required|string|max:45',
            'state' => 'required|in:active,deleted',
        ];
    }

    public function messages(): array
    {
        return [
            'birth_date.before_or_equal' => 'Birth date cannot be in the future.',
            'entry_datetime.after_or_equal' => 'Entry date/time cannot be earlier than birth date.',
            'entry_datetime.before_or_equal' => 'Entry date/time cannot be in the future.',
        ];
    }
}
