<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'cedula' => 'numeric|required|unique:usuarios,cedula,'.$this->usuario,
            'nombres' => 'regex:/^[\pL\s\-]+$/u|min:5|max:100|required',
            'apellidos' => 'regex:/^[\pL\s\-]+$/u|max:100|required',
            'email' => 'email|required|max:150|unique:usuarios,email,'.$this->usuario,
            'celular' => 'numeric|required',
            'direccion' => 'max:180',
            'categoria_id' => 'required|exists:categorias,id'
        ];
    }

    public function messages()
    {
        return [
            'cedula.numeric' => 'Solo se aceptan valores numéricos',
            'cedula.required' => 'Debe indicar el número de cédula',
            'cedula.unique' => 'Ya existe un usuario regitrado con esta cédula',
            'nombres.alpha' => 'Solo se aceptan carácteres alfabéticos',
            'nombres.min' => 'La longitud mínima es de cinco (5) caracteres',
            'nombres.max' => 'La longitud máxima es de cien (100) caracteres',
            'nombres.required' => 'Debe indicar el(los) nombre(s) del usuario',
            'apellidos.alpha' => 'Solo se aceptan carácteres alfabéticos',
            'apellidos.min' => 'La longitud mínima es de cinco (5) caracteres',
            'apellidos.max' => 'La longitud máxima es de cien (100) caracteres',
            'apellidos.required' => 'Debe indicar el(los) apellidos(s) del usuario',
            'email.email' => 'Debe indicar una dirección de correo electrónico valida',
            'email.required' => 'Debe indicar el correo electrónico del usuario',
            'email.max' => 'La longitud máxima es de ciento cincuenta (150) caracteres',
            'email.unique' => 'Ya existe un usuario regitrado con este correo electrónico',
            'celular.required' => 'Debe indicar el número de teléfono del usuario',
            'celular.numeric' => 'Solo se aceptan valores numéricos',
            'direccion.max' => 'La longitud máxima es de ciento ochenta (180) caracteres',
            'categoria_id.required' => 'Debe seleccionar la categoría para el usuario',
            'categoria_id.exists' => 'La categoría seleccionada no existe en nuestra base de datos',
        ];
    }


}
