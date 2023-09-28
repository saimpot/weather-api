<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Infrastructure\Repository\Command;

use WeatherApi\Core\Weather\Domain\Entity\Location;
use WeatherApi\Core\Weather\Infrastructure\Eloquent\Models\LocationModel;

class LocationCommandRepository
{
    public function store(Location $location): LocationModel
    {
        $model = new LocationModel($location->toArray());
        $model->save();

        return $model;
    }
}
