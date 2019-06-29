<?php

namespace SurtidoraLainez\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProveedorRequest extends FormRequest
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
            'Rtn' => 'required|max: 14',
            'NombreProveedor' => 'required|max: 50',
            'Telefono' => 'required|max: 8| min:6',
            'Correo'=> 'required|max: 60|email|min: 10',
            'Direccion'=> 'required|max: 80|min:5'
        ];
    }
}
