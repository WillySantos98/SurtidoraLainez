<?php

namespace SurtidoraLainez\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveColaborador extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre' => 'required|min:6|max:70',
            'FechaNacimiento' => 'required',
            'FechaInicio' => 'required',
            'Telefono' => 'required|min:5|max:8',
            'Correo' => 'required|min:10|max:60',
            'SelectSucursal' => 'required',
            'SelectTipoColaborador' => 'required'
        ];
    }
}
