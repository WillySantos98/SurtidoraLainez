<?php

namespace SurtidoraLainez\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSucursal extends FormRequest
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
            'NombreSucursal' => 'required|max:50',
            'Slug' => 'required|max:8',
            'Telefono' => 'required|min:5|max:8',
            'Correo' => 'required|min:5|max:60',
            'Direccion' => 'required|max:150'
        ];
    }
}
