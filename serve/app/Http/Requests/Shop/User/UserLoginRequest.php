<?php

namespace App\Http\Requests\Shop\User;


use App\Http\Requests\FormRequest;

class UserLoginRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "mobile"=>"required",
            "password"=>"required",
        ];
    }
}
