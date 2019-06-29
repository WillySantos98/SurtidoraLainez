<?php

namespace SurtidoraLainez\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveDatosCliente extends FormRequest
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
            'NombreCliente' => 'min:2|max:50',
            'ApellidosCliente' => 'max: 50|min: 2',
            'IdentidadCliente' => 'max: 13| min:8',
        ];
    }
}
