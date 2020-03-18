<?php

namespace App\Models\Vehicle;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }
}
