<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'email' => 'required|max:255|email|unique:users,email,' . request()->route('user')->id,
            'password' => 'sometimes|nullable|min:8|max:50|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'roles' => 'exists:roles,id'
        ];
    }
}
