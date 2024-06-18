<?php

namespace App\Models\Factories;

use App\Models\Station;
use Illuminate\Support\Arr;

class StationFactory
{
    public function make(array $attributes): Station
    {
        $station = new Station();

        $station->stationId = Arr::get($attributes, 'STATION_ID');
        $station->name = Arr::get($attributes, 'NAME');
        $station->wmoId = Arr::get($attributes, 'WMO_ID');
        $station->beginDate = Arr::get($attributes, 'BEGIN_DATE');
        $station->endDate = Arr::get($attributes, 'END_DATE');
        $station->latitude = Arr::get($attributes, 'LATITUDE');
        $station->longitude = Arr::get($attributes, 'LONGITUDE');
        $station->gauss1 = Arr::get($attributes, 'GAUSS1');
        $station->gauss2 = Arr::get($attributes, 'GAUSS2');
        $station->geogr1 = Arr::get($attributes, 'GEOGR1');
        $station->geogr2 = Arr::get($attributes, 'GEOGR2');
        $station->elevation = Arr::get($attributes, 'ELEVATION');
        $station->elevationPressure = Arr::get($attributes, 'ELEVATION_PRESSURE');

        return $station;
    }
}
