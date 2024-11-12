<?php

namespace App\Http\Resources\Dashboard\SafetyItems;

use Illuminate\Http\Resources\Json\JsonResource;

class SafetyItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'item_desc' => $this->getTranslations('item_desc'),
            'category_id' => $this->category_id,
            'category' => $this->category,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
