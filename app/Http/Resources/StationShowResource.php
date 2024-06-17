<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StationShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'Station_id' => $this->stationId,
            'Name' => $this->name,
            'Wmo_id' => $this->wmoId,
            'Begin_date' => $this->beginDate,
            'End_date' => $this->endDate,
            'Latitude' => $this->latitude,
            'Longitude' => $this->longitude,
            'Gauss1' => $this->gauss1,
            'Gauss2' => $this->gauss2,
            'Geogr1' => $this->geogr1,
            'Geogr2' => $this->geogr2,
            'Elevation' => $this->elevation,
            'Elevation_pressure' => $this->elevationPressure,
        ];
    }
}
