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
            'address' => 'nullable|min:3|max:200',
            'district' => 'nullable|min:3|max:200',
            'phone' => 'nullable|min:3',
            'fax' => 'nullable|min:3|max:50',
            'email' => 'nullable|min:10',
            'liable' => 'nullable|min:3|max:200',
            'others' => 'nullable|min:3',
        ];
    }
}
