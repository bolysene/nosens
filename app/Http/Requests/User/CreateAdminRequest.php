<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateAdminRequest
 * @package App\Http\Requests\User
 */
class CreateAdminRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'password-confirmation'=>'confirmed',
            'gender' => 'required',
            'blood_group' => 'required',
            'phone_number' => 'required|unique:users',
            'email' => 'email|max:255|unique:users',
        ];
    }

    public function attributes()
    {
        return [
                    'name'=>'nom',
                    'password'=>'mot de passe',
                    'gender'=>'genre',
                    'blood_group'=>'groupe sanguin',
                    'phone_number'=>'numero de téléphone',
                    'email'=>'email'
                ];
    }

    public function messages()
    {
        return [
                 'validation.required' => 'Ce champs est obligatoire',
            
        ];
    }
}
