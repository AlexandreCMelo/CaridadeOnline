<?php

namespace Charis\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
            'organization_email' => 'required|email',
            'name'      => 'required',
            'cnpj'               => 'required',
            'password'           => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }
}
