<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
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
            'name' => 'Required|min:3|max:50',
            'email' => 
            [   
                'Required','email',
                Rule::unique('users','email')->ignore($this->id),
            ],
            'password' => 'Required|min:8|Present',
            'password_confirmation' => 'required|min:8|same:password',
            'phone_number' => ['required', 'regex:/^[0-9]{6,13}$/',Rule::unique('users','phone_number')->ignore($this->userId)],
            'address_1' => 'nullable',
            'address_2' => 'nullable',
            'city_id' => 'nullable',
            'district_id' => 'nullable',                                                     
            'ward_id' => 'nullable',
        ];
    }
}
