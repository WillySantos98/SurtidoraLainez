<?php

namespace SurtidoraLainez\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveContactoProveedorRequest extends FormRequest
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
            'SelectProveedor' => 'required',
            'NombreContacto' => 'required|max: 50|min: 6',
            'Telefono' => 'required|max: 8| min:6',
            'Correo'=> 'required|max: 60|email|min: 10',
            'Funcion'=> 'required|max: 30|min:5'
        ];
    }
}
