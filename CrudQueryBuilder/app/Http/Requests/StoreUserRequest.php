<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    // Determina si el usuario está autorizado a realizar esta solicitud
    public function authorize()
    {
        return true;
    }

    // Define las reglas de validación
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|integer|min:0'
        ];
    }

    // Mensajes de error personalizados
    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'Este email ya está registrado',
            'age.required' => 'La edad es obligatoria',
            'age.integer' => 'La edad debe ser un número entero',
            'age.min' => 'La edad no puede ser negativa'
        ];
    }
} 