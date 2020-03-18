<?php

namespace App\Services;

use App\Models\Vehicle\Make;
use App\Models\Vehicle\Model;
use GuzzleHttp\Client as HttpClient;

class VehicleCatalogue implements Client
{
    /** @var HttpClient */
    protected $client;

    /** @var string */
    protected $baseUri;

    /** @var string */
    protected $token;

    /** @var array */
    protected $options;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
        $this->baseUri = config('services.vpic.base_url');
        $this->token = cache()->get('access_token') ?? null;
        $this->options = [
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
            ],
        ];
    }

    public function getMakes(string $format = 'json'): bool
    {
        $response = $this->getRequest('getallmakes');
        $makes = collect(json_decode($response));

        dd($makes->first());
        dd($response->getBody()->getContents());
    }

    public function getManufacturerDetails(Make $manufacturer): bool
    {
    }

    public function getModels(?Make $manufacturer = null): bool
    {
    }

    public function getModelDetails(Model $model): bool
    {
    }

    public function checkVIN(string $vin): bool
    {
    }

    public function buildUri(?string $suffix): string
    {
        return $this->baseUri . $suffix;
    }

    public function getRequest(string $uri, string $format = 'json'): string
    {
        $url = $this->buildUri("{$uri}?format={$format}");

        $response = $this->client->get($uri);

        return $response->getBody()->getContents();
    }
}
