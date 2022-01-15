<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "name" => "required",
            "email" => "email|required",
            "phone" => "required",
            "text" => "required|min:5"
        ];
    }


    public function messages()
    {
        return [
            "name.required" => "Nombre es requerido",
            "email.email" => "Email no tiene un formato válido",
            "email.required" => "Email es requerido",
            "phone.required" => "Teléfono es requerido",
            "text.required" => "Mensaje es requerido",
            "text.min" => "Mensaje debe contener mínimo 5 caracteres"
        ];
    }
}
