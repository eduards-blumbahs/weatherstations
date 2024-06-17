<?php

namespace App\Models;

class Station
{
    public ?string $stationId = null;
    public ?string $name = null;
    public ?string $wmoId = null;
    public ?string $beginDate = null;
    public ?string $endDate = null;
    public ?string $latitude = null;
    public ?string $longitude = null;
    public ?string $gauss1 = null;
    public ?string $gauss2 = null;
    public ?string $geogr1 = null;
    public ?string $geogr2 = null;
    public ?string $elevation = null;
    public ?string $elevationPressure = null;
}
