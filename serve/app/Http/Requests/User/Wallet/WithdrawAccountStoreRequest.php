<?php

namespace App\Http\Requests\User\Wallet;


use App\Http\Requests\FormRequest;

class WithdrawAccountStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "way"=>"required",
            "account"=>"required|array",
            "account.name"=>"required",
            "account.id"=>"required"
        ];
    }
}
