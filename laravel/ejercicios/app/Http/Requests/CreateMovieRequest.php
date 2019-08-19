<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            'title' => 'required|min:3',
            'length' => 'required|integer|between:1,300',
            'rating' => 'required|numeric|between:0,10',
            'awards' => 'required|integer|min:0',
            'release' => 'required|date',
        ];
    }

    public function messages() {
      return [
         'required' => 'Este campo es obligatorio',
         'integer' => 'Debe ingresar un valor numérico entero',
         'numeric' => 'Debe ingresar un valor numérico',
         'between' => 'Debe ingresar un valor numérico entre :min y :max',
         'min' => 'Debe ingresar un valor numérico mayor o igual a :min',
         'date' => 'Debe ingresar una fecha válida'
      ];
   }
}
