<?php

namespace App\Http\Resources\Shop\Sms;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SmsSignCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            "data" => SmsSignResource::collection($this->collection),
            'page' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage()
            ],
        ];
    }
}
