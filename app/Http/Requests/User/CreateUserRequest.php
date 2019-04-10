<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateUserRequest
 * @package App\Http\Requests\User
 */
class CreateUserRequest extends FormRequest
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
            'email' => 'sometimes|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'section' => 'required|numeric',
            'gender' => 'required|string',
            'blood_group' => 'string',
            'nationality' => 'string',
            'father_name' => 'string',
            'mother_name' => 'string',
            'phone_number' => 'required|unique:users',
            'address' => 'required|string',
            'session' => 'required',
            // 'version' => 'required',
            'birthday' => 'required',
            'religion' => 'string',
        ];
    }

     public function attributes()
    {
        return [
                    'name'=>'Nom',
                    'email'=>'Email',
                    'section'=>'Filière',
                    'password'=>'Mot de passe',
                    'gender'=>'Le genre',
                    'blood_group'=>'Le groupe sanguin',
                    'phone_number'=>'Le numero de téléphone',
                    'blood_group'=>'Le group sanguin',
                    'birthday'=>'Date de naissance'
                ];
    }

     public function messages()
    {
        return [
                 'validation.required' => 'Ce champs est obligatoire',
            
        ];
    }
}
