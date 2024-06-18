<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

readonly class StationService
{
    public function __construct(
        private string $basePath,
        private string $resourceId
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function getStations(): array
    {
        $response = $this->get();

        $stations = $response->json('result.records');

        if (empty($stations)) {
            throw new \Exception('Stations not found');
        }

        return $stations;
    }

    /**
     * @throws \Exception
     */
    public function getStation(string $id): array
    {
        $response = $this->get(['filters' => json_encode(['STATION_ID' => $id])]);

        $station = $response->json('result.records.{first}');

        if (empty($station)) {
            throw new \Exception('Station not found');
        }

        return $station;
    }

    /**
     * @throws \Exception
     */
    private function get(array $params = []): Response
    {
        $params = array_merge([
            'resource_id' => $this->resourceId
        ], $params);

        $response = Http::get(sprintf('%s?%s', $this->basePath, http_build_query($params)));

        if (!$response->ok()) {
            throw new \Exception('Failed to get data');
        }

        return $response;
    }
}
