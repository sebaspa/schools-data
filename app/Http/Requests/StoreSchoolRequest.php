<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'name' => 'required|min:3|max:200|unique:schools,name',
            'address' => 'required|min:3|max:200|unique:schools,address',
            'district' => 'required|min:3|max:200',
            'phone' => 'required|min:3|max:50',
            'fax' => 'required|min:3|max:50',
            'email' => 'required|email|max:100|unique:schools,email',
            'liable' => 'required|min:3|max:100',
            'others' => 'min:3',
        ];
    }
}
