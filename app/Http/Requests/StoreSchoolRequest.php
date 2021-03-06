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
            'code' => 'required|min:3|max:200|unique:schools,code',
            'name' => 'required|min:3|max:200|unique:schools,name',
            'address' => 'nullable|min:3|max:200',
            'district' => 'nullable|min:3|max:200',
            'phone' => 'nullable|min:3',
            'fax' => 'nullable|min:3|max:50',
            'email' => 'nullable|min:10',
            'liable' => 'nullable|min:3|max:200',
            'image' => 'nullable|mimes:jpg,jpeg,png|dimensions:min_width=600,min_height=400|max:3000',
            'others' => 'nullable|min:3',
        ];
    }
}
