<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartenaireRequest extends FormRequest
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
            'nom' => 'required|regex:/^[\pL\s\-]+$/u|min:3',
            'nom_respo' => 'required|regex:/^[\pL\s\-]+$/u|min:3',
            'prenom_respo' => 'required|regex:/^[\pL\s\-]+$/u|min:3',
            'numtel_respo' => 'required|min:10|regex:%^[+]{0,1}[(]{0,1}[0-9]{0,3}[)]{0,1}[-\s\./0-9]{1,15}$%',
            'email' => 'required|E-Mail|unique:users,email',
            'forme_juridique' => 'required',
            'password' => 'required|confirmed|min:6',
            'photo' =>'required|file|image'





        ];
    }
}
