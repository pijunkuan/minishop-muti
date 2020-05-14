<?php

namespace App\Http\Requests\Customer;


use App\Http\Requests\FormRequest;

class Register extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "mobile"=>[
                'required',
                "string",
            ],
            "password"=>[
                'required',
                'alpha_dash',
                'min:6',
                "confirmed"
            ]
        ];
    }
}
