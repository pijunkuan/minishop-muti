<?php

namespace App\Http\Resources\Shop\Sms;

use App\Models\ShopSmsLog;
use Illuminate\Http\Resources\Json\JsonResource;

class SmsLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
           "mobile"=>$this['mobile'],
           "content"=>$this['content'],
           "type"=>$this['type'],
           "type_value"=>ShopSmsLog::smsTypeMap[$this['type']],
           "amount"=>$this['amount'],
           "last_amount"=>$this['last_amount'],
           "next_amount"=>$this['next_amount'],
           "created_at"=>$this['created_at']->toDateTimeString(),
       ];
    }
}
