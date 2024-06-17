<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'Station_id' => $this->stationId,
            'Name' => $this->name,
        ];
    }
}
