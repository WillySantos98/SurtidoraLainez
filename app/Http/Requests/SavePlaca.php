<?php

namespace SurtidoraLainez\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePlaca extends FormRequest
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
            'NumeroBoleta' => 'max:7|required|min:7',
            'Comprobante' => 'max:11|min:11|required',
            'FechaVencimiento' => 'date|required',
            'Placa' => 'max:7|min:7|required',
            'Identificacion' => 'required|min:13|max:14',
            'Propietario' => 'required',
            'Año'=> 'required|max:4|min:4',
            'FileBoleta' => 'required'
        ];
    }
}
