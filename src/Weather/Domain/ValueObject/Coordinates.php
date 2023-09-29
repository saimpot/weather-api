<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\ValueObject;

use WeatherApi\Core\Common\Domain\ValueObject\BaseValueObject;
use WeatherApi\Core\Weather\Domain\Exception\InvalidFormatException;

class Coordinates extends BaseValueObject
{
    public function __construct(
        public readonly Latitude $latitude,
        public readonly Longitude $longitude,
    ) {
    }

    public function __toString(): string
    {
        return sprintf('%s, %s', $this->latitude, $this->longitude);
    }

    public static function fromString(string $value): self
    {
        $arrayOfValues = explode(',', $value);

        if (count($arrayOfValues) !== 2) {
            throw new InvalidFormatException($value);
        }

        return new Coordinates(
            Latitude::fromString(trim($arrayOfValues[0])),
            Longitude::fromString(trim($arrayOfValues[1])),
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'latitude'  => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
