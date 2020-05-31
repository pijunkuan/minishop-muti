<?php

namespace App\Http\Resources\Order\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminOrderTipsResource extends JsonResource
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
            "tip" => $this['tip'],
            "created_at"=>$this['created_at']->toDateTimeString()
        ];
    }
}
