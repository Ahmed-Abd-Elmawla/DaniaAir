<?php

namespace App\Http\Resources\Dashboard\SafetyReports;

use App\Http\Resources\Dashboard\SafetyItems\ReportItemResource;
use Illuminate\Http\Resources\Json\JsonResource;
class SafetyReportsResource extends JsonResource
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
            'date' => $this->date,
            'time' => $this->time,
            'inspector_name' => $this->inspector_name,
            'items' => ReportItemResource::collection($this->items),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
