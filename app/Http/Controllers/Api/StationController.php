<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StationShowResource;
use App\Http\Resources\StationIndexResource;
use App\Models\Station;

class StationController extends Controller
{
    public function index()
    {
        return StationIndexResource::collection([]);
    }

    public function show(string $id)
    {
        return new StationShowResource(new Station());
    }

}
