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
			'name' => 'required|string',
			'birth_date' => 'required',
			'entry_datetime' => 'required',
			'crime' => 'required|string',
			'cell' => 'required|string',
			'state' => 'required',
        ];
    }
}
