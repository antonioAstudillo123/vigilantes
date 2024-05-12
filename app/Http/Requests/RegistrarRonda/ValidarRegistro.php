<?php

namespace App\Http\Requests\RegistrarRonda;

use Illuminate\Foundation\Http\FormRequest;

class ValidarRegistro extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'numEmpleado' => 'required|numeric'
        ];
    }


    public function messages(): array
{
    return [
        'numEmpleado.required' => 'El número de empleado es obligatorio',
        'numEmpleado.numeric' => 'El número de empleado debe ser un valor númerico',
    ];
}
}
