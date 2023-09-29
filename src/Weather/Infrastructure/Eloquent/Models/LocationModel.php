<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use WeatherApi\Core\Weather\Infrastructure\Eloquent\Models\BaseModels\BaseLocationModel;

class LocationModel extends BaseLocationModel
{
    use HasFactory;
}
