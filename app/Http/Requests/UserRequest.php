<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        // dd($this->customer);
        $arr = [
            'name' => 'required|string|min:6|max:20',
            // 'password' => ['required','min:6','max:32',
            // 'password_confirmation' => 'required|same:password',
            'phone_number' => 'required|string|min:6|max:10',
            // 'mobile' => ['required', 'regex:/^[0-9]{6,13}$/',Rule::unique('users','mobile')->ignore($this->customer)],
            // 'company' => 'required|max:255',
            'address_1' => 'required|string',
            'address_2' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            // 'zipcode' => 'required|min:3|max:6',
            // 'g-recaptcha-response' => 'required',
        ];
        // if(!$this->customer){
        //     $arr['email'] = 'required|string|email|unique:users,email|max:191';
        // }
        return $arr;
    }

    /**
     * Custom message response when field invalid
     * @return array
     */

    public function withValidator($validator)
{
    // $validator->after(function ($validator) {
    //     if (count($validator->errors()->all())) {
    //         $validator->errors()->add('is_error_regis', 'Something is wrong with this field!');
    //     }
    //     // dd($validator->errors()->all()) ;
    // });
}


    public function messages(){
        return [
            'password.regex' => __('validation.attributes.password_regex'),
            'password.min' => __('validation.attributes.password_regex'),
            'password.max' => __('validation.attributes.password_regex'),
        ];
    }


}
