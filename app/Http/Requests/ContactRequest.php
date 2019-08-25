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
            'nom' => 'required|alpha|min:3',
            'prenom' => 'required|alpha|min:3',
            'numtel' => 'required|min:10|regex:%^[+]{0,1}[(]{0,1}[0-9]{0,3}[)]{0,1}[-\s\./0-9]{1,15}$%',
            'email' => 'required|E-Mail',
            'objet' => 'required|min:10',
            'message' => 'required|min:20'
        ];
    }
}
