<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StationShowResource;
use App\Http\Resources\StationIndexResource;
use App\Models\Factories\StationFactory;
use App\Services\StationService;

class StationController extends Controller
{
    public function __construct(
        private readonly StationService $service,
        private readonly StationFactory $factory
    )
    {
    }

    public function index()
    {
        try {
            $stationsData = $this->service->getStations();

            $stations = array_map(fn($station) => $this->factory->make($station), $stationsData);

            return StationIndexResource::collection($stations);
        } catch (\Throwable $exception) {
            return StationIndexResource::collection([]);
        }
    }

    public function show(string $id)
    {
        try {
            $stationData = $this->service->getStation($id);

            $station = $this->factory->make($stationData);

            return new StationShowResource($station);
        } catch (\Throwable $exception) {
            return response()->json(['message' => $exception->getMessage()], 404);
        }
    }

}
