<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicoRequest extends FormRequest
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
            'rut'=>['required','max:12'],
            'nombre'=>['required','max:255'],
            'apellidoPaterno'=>['required','max:255'],
            'apellidoMaterno'=>['required','max:255'],
            'fkCargo'=>['required']
        ];
    }
}
