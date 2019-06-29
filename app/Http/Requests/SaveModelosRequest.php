<?php

namespace SurtidoraLainez\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveModelosRequest extends FormRequest
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
            'Cilindraje' => 'required|min:3',
            'NombreModelo' => 'required'
        ];
    }
}
