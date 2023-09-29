<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Application\DataTransferObject;

use Illuminate\Http\Request;
use WeatherApi\Core\Weather\Domain\ValueObject\Coordinates;
use WeatherApi\Core\Weather\Domain\ValueObject\Latitude;
use WeatherApi\Core\Weather\Domain\ValueObject\Longitude;
use WeatherApi\Core\Weather\Domain\ValueObject\Name;

class LocationDTO
{
    public function __construct(
        public readonly Name $name,
        public readonly Coordinates $coordinates,
        public readonly bool $is_active,
    ) {
    }
}
