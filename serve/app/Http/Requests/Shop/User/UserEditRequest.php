<?php

namespace App\Http\Requests\Shop\User;


use App\Http\Requests\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "password"=>"required|confirmed"
        ];
    }
}
