<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $id = $this->id;
        if (!isset($id)) {
            $id = '';
        }



        $rules = [
            'uname' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'confirmed|required',
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:5120',
            'auth_type'=>'required'
        ];


        if (!empty($id)) {
            $rules['oldpassword'] = 'required|old_password_check:users,password,' . $id;
        }

        return $rules;
    }

    public function messages()
    {

        return [
            'uname.required' => 'User Name is empty',
            'uname.min' => 'User Name must be greater than 3',
            'email.required' => 'Email is empty',
            'password.required' => 'Password is empty',
            'confirmed' => 'Password miss match',
            'email.unique' => 'Email must be unique',
            'email.email' => 'Not Valid Email',
            'oldpassword.old_password_check'=>'Password missmatch',
            'image.mimes'=>'Extension invalid',
            'image.max'=>'Upload size exceeds',
            'image.required'=>'Image not found',
            'auth_type.required'=>'Must select an authentication type'
        ];
    }
}
