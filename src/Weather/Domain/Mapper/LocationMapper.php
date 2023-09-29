<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\Mapper;

use Illuminate\Http\Request;
use WeatherApi\Core\Weather\Domain\Entity\Location;
use WeatherApi\Core\Weather\Domain\ValueObject\Active;
use WeatherApi\Core\Weather\Domain\ValueObject\Coordinates;
use WeatherApi\Core\Weather\Domain\ValueObject\Latitude;
use WeatherApi\Core\Weather\Domain\ValueObject\Longitude;
use WeatherApi\Core\Weather\Domain\ValueObject\Name;
use WeatherApi\Core\Weather\Infrastructure\Eloquent\Models\LocationModel;

class LocationMapper
{
    public static function fromRequest(Request $request): Location
    {
        return new Location(
            id: null,
            name: Name::fromString($request->input('name')),
            coordinates: new Coordinates(
                latitude: Latitude::fromString($request->input('latitude')),
                longitude: Longitude::fromString($request->input('longitude'))
            ),
            is_active: Active::fromString($request->input('is_active')),
        );
    }

    public function toEntity(LocationModel $locationModel): Location
    {
        return new Location(
            id: $locationModel->id,
            name: $locationModel->name,
            coordinates: new Coordinates(
                latitude: $locationModel->latitude,
                longitude: $locationModel->longitude,
            ),
            is_active: $locationModel->is_active,
        );
    }
}
