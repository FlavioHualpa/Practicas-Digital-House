<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActorRequest extends FormRequest
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
         'rating' => 'required|numeric|between:0,10',
         'portrait' => 'file|image',
      ];
   }

   public function messages()
   {
      return [
         'required' => 'Este campo es obligatorio',
         'min' => 'El :attribute debe tener al menos :min caracteres',
         'alpha' => 'El :attribute no debe incluir números',
         'rating.between' => 'El valor de :attribute debe ser un número entre :min y :max',
         'image' => 'Debe seleccionar una imagen',
      ];
   }
}
