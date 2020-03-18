<?php

namespace App\Models\Vehicle;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Manufacturer extends EloquentModel
{
    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }

    public function vehicles(): HasManyThrough
    {
        return $this->hasManyThrough(Vehicle::class, Model::class);
    }
}
