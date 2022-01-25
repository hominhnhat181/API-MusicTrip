<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShippingAddressRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'phone_number' =>  'required|regex:/^[0-9]{6,13}$/',
            'address_1' => 'required|string|max:191',
            'address_2' => 'required|string|max:191',
            'city' => 'required',
            'district' => 'required',
            'ward' => 'required',
        ];
    }
}
