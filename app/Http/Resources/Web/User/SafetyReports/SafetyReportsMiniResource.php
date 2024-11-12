<?php

namespace App\Http\Resources\Web\User\SafetyReports;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SafetyReportsMiniResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'date' => $this->date,
            'time' => $this->time,
            'inspector_name' => $this->inspector_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
