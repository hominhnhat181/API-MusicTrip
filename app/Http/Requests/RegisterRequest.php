<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:6|max:20',
            'email' => 'required|email',
            'phone_number' => 'required|string|min:6|max:12',
            'password' => 'required','min:6','max:32',
            'password_confirmation' => 'required|same:password',
            'address_1' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
        ];
    }

    /**
     * Custom message response when field invalid
     * @return array
     */

    public function withValidator($validator)
{
  
}

    public function messages(){
        return [
            'password.regex' => __('validation.attributes.password_regex'),
            'password.min' => __('validation.attributes.password_regex'),
            'password.max' => __('validation.attributes.password_regex'),
        ];
    }


}
