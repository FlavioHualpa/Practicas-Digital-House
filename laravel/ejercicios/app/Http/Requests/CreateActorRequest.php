<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateActorRequest extends FormRequest
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
            'first_name' => 'required|min:3|alpha',
            'last_name' => 'required|min:3|alpha',
            'portrait' => 'file|image',
        ];
    }

    public function messages()
    {
      return [
         'required' => 'Este campo es obligatorio',
         'min' => 'El :attribute debe tener al menos :min caracteres',
         'alpha' => 'El :attribute no debe incluir números',
         'image' => 'Debe seleccionar una imagen',
      ];
   }
}
