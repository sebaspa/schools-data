<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
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
            'name' => 'required|min:3|max:200|unique:schools,name,' . request()->route('school')->id,
            'address' => 'required|min:3|max:200|unique:schools,address,' . request()->route('school')->id,
            'district' => 'required|min:3|max:200',
            'phone' => 'required|min:3|max:50',
            'fax' => 'required|min:3|max:50',
            'email' => 'required|email|max:100|unique:schools,email,' . request()->route('school')->id,
            'liable' => 'required|min:3|max:100',
            'others' => 'min:3',
        ];
    }
}
