<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VisitorRequest extends FormRequest
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
        $visitorId = $this->route('visitor')?->id ?? $this->route('visitor');

        return [
            'name' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:255', Rule::unique('visitors', 'id_number')->ignore($visitorId)],
            'relationship_to_prisoner' => ['required', 'string'],
            'state' => ['required', 'in:active,deleted'],
        ];
    }

    public function messages(): array
    {
        return [
            'id_number.unique' => 'This ID number is already registered for another visitor.',
        ];
    }
}