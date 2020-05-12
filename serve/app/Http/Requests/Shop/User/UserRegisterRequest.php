<?php

namespace App\Http\Requests\Shop\User;


use App\Http\Requests\FormRequest;

class UserRegisterRequest extends FormRequest
{

    public function rules()
    {
        return [
            "mobile"=>"required|unique:users,mobile|string",
            "password"=>"required|confirmed|alpha_dash|min:6"
        ];
    }
}
