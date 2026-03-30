<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $userId = $this->route('user')?->id ?? $this->route('user');
        $passwordRules = $this->isMethod('post')
            ? ['required', 'string', 'min:6', 'confirmed']
            : ['nullable', 'string', 'min:6', 'confirmed'];

        return [
            'name' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', Rule::unique('users', 'id_number')->ignore($userId)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'password' => $passwordRules,
            'rol_id' => ['required', 'exists:rols,id'],
            'state' => ['required', 'in:active,deleted'],
        ];
    }
}
