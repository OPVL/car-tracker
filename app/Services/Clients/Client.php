<?php

namespace App\Services;

use App\Models\Vehicle\Make;
use App\Models\Vehicle\Model;

interface Client
{
    public function getMakes(string $format = 'json'): bool;

    public function getManufacturerDetails(Make $manufacturer): bool;

    public function getModels(?Make $manufacturer = null): bool;

    public function getModelDetails(Model $model): bool;

    public function checkVIN(string $vin): bool;
}
