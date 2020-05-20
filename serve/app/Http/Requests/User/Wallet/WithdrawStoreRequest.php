<?php

namespace App\Http\Requests\User\Wallet;



use App\Http\Requests\FormRequest;

class WithdrawStoreRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "account_id"=>[
                "required",
                function($attribute , $value , $fail){
                    if(!auth('users')->user()->wallet->accounts()->find($value)){
                        return $fail('该提现账户尚未创建');
                    }
                }
            ],
            "amount"=>"required|numeric"
        ];
    }
}
