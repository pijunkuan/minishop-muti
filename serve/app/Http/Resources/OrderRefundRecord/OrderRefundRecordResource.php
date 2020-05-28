<?php

namespace App\Http\Resources\OrderRefundRecord;

use App\Models\OrderRefundRecord;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderRefundRecordResource extends JsonResource
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
            "no"=>$this['no'],
            "amount"=>$this['amount'],
            "status"=>$this['status'],
            "status_value"=>OrderRefundRecord::recordStatusMap[$this['status']],
            "content"=>$this['content'],
            "created_at"=>$this['created_at']->toDateTimeString(),
        ];
    }
}
