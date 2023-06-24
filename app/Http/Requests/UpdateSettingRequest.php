<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateSettingRequest extends FormRequest
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
        if ($this->request->get('sectionName') == 'contact-information') {
            return [
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'address_one' => 'required',
                'address_two' => 'required',
                'postal_code' => 'required',
            ];
        }

        if ($this->request->get('sectionName') == 'general') {
            return [
                'email' => 'required|email:filter',
                'specialities' => 'required',
                'clinic_name' => 'required',
                'contact_no' => 'required',
                'logo' => 'image|mimes:jpeg,png,jpg',
                'favicon' => 'image|mimes:png|dimensions:width=32,height=32',
                'payment_gateway_4_client_id' => [
                    Rule::when(in_array(4, $this->get('payment_gateway')), 'required',)
                ],
                'payment_gateway_4_secret_key' => [
                    Rule::when(in_array(4, $this->get('payment_gateway')), 'required',)
                ],
                'payment_gateway_2_client_id' => [
                    Rule::when(in_array(2, $this->get('payment_gateway')), 'required',)
                ],
                'payment_gateway_2_client_id' => [
                    Rule::when(in_array(2, $this->get('payment_gateway')), 'required',)
                ],
            ];
        }
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'payment_gateway_4_client_id.required' => 'Paypal client id required',
            'payment_gateway_4_secret_key.required' => 'Paypal secret key required',
            'payment_gateway_2_client_id.required' => 'Stripe client id required',
            'payment_gateway_2_client_id.required' => 'Stripe secret key required',
            'country_id.required' => 'Country field is required.',
            'state_id.required' => 'State field is required.',
            'city_id.required' => 'City field is required.',
            'address_one.required' => 'Address 1 field is required.',
            'address_two.required' => 'Address 2 field is required.',
            'logo.dimensions' => 'Logo size should be 90 x 60 pixel',
            'favicon.dimensions' => 'Favicon size should be 32 x 32 pixel',
        ];
    }

}
