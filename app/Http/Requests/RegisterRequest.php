<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

            'rol' => 'required|in:admin,alcalde,ciudadano',

            'municipio_id' => [
                Rule::requiredIf(fn () => $this->rol === 'ciudadano'),
                'nullable',
                'exists:municipios,id',
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'No tiene el formato del email',
            'rol.in' => 'Rol incorrecto',
            'municipio_id.required' => 'El municipio es obligatorio para los ciudadanos'
        ];
    }
}
