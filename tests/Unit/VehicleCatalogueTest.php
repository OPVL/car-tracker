<?php

namespace Tests\Unit;

use App\Services\VehicleCatalogue;
use GuzzleHttp\Client;
use Tests\TestCase;

class VehicleCatalogueTest extends TestCase
{
    private function client(): VehicleCatalogue
    {
        $catalogue = $this->mock(VehicleCatalogue::class);
        $catalogue->shouldReceive('getRequest')
            ->with('getallmakes')
            ->andReturn(file_get_contents(__DIR__ . '/__snapshots__/makes.json'));

        return app(VehicleCatalogue::class);
    }

    /** @test */
    public function it_can_execute()
    {
        dd($this->client()->getRequest('getallmakes'));
    }
}
