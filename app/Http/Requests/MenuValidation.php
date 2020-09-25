<?php

namespace App\Http\Requests;

use App\Rules\Menu\ValidateFieldUrl;
use Illuminate\Foundation\Http\FormRequest;

class MenuValidation extends FormRequest
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
      'name' => 'required|max:50|unique:menu,name,' . $this->route('id'),
      'url' => ['required', 'max:100', new ValidateFieldUrl],
      'icon' => 'nullable|max:50'
    ];
  }

  /**
   * El siguiente codigo es la forma de 
   * crear los mesajes de forma predeterminada
   */
  // public function messages()
  // {
  //   return [
  //     'name.required' => "El campo nombre es requerido",
  //     'name.max' => 'El campo nombre debe ser menor de 50 caracteres',
  //     'url.required' => "El campo url es requerido",
  //     'url.max' => 'El campo url no puede ser mayor que 100 caracteres',
  //     'icon.max' => 'El campo icono debe ser menor de 50 caracteres'
  //   ];
  // }

  /**
   * El siguiente codigoes para definir alias para mis 
   * atributos
   */
  public function attributes()
  {
    return[
      'name' => 'nombre',
      'icon' => 'icono'
    ];
  }
}
