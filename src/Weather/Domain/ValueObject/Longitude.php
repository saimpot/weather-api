<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\ValueObject;

use WeatherApi\Core\Common\Domain\Exception\RequiredException;
use WeatherApi\Core\Common\Domain\ValueObject\FloatValueObject;
use WeatherApi\Core\Weather\Domain\Exception\InvalidFormatException;

final class Longitude extends FloatValueObject
{
    public function __construct(
        public readonly ?float $longitude
    ) {
        if (!$longitude) {
            throw new RequiredException('Longitude');
        }

        if ($longitude < -180) {
            throw new \LogicException('Longitude cannot be less that -180.0');
        }

        if ($longitude > 180) {
            throw new \LogicException('Longitude cannot be greater that 180.0');
        }
    }

    public function __toString(): string
    {
        return (string) $this->longitude;
    }

    public static function fromString(string $value): self
    {
        if (!preg_match('/^\d+(\.\d+)?$/', $value)) {
            throw new InvalidFormatException($value);
        }

        return new Longitude((float) $value);
    }

    public function jsonSerialize(): string
    {
        return (string) $this->longitude;
    }
}
