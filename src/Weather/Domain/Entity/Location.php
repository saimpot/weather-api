<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\Entity;

use WeatherApi\Core\Common\Entity\AbstractEntity;
use WeatherApi\Core\Weather\Domain\ValueObject\Active;
use WeatherApi\Core\Weather\Domain\ValueObject\Coordinates;
use WeatherApi\Core\Weather\Domain\ValueObject\Name;

class Location extends AbstractEntity
{
    public function __construct(
        public readonly ?int $id,
        public readonly Name $name,
        public readonly Coordinates $coordinates,
        public readonly Active $is_active,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name'      => $this->name,
            'latitude'  => $this->coordinates->latitude,
            'longitude' => $this->coordinates->longitude,
            'is_active' => $this->is_active,
        ];
    }
}
