<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|max:255|regex:/^[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,64}/',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,gif,svg|max:2048',
            'role_id' => 'required',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'role_id' => "The role field is required",
            'phone_number' => 'The phone number field is required'
        ];
    }
}
