<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioCreateRequest extends FormRequest
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
            //
            'nombre' => 'required|min:3|max:50',
            'apellidos' => 'required|min3:|max:100',
            'username' =>  'required|unique:username',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|unique:email|email'
        ];
    }
}
