<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\ValueObject;

use WeatherApi\Core\Common\Domain\Exception\RequiredException;
use WeatherApi\Core\Common\Domain\ValueObject\BaseValueObject;
use WeatherApi\Core\Weather\Domain\Exception\InvalidFormatException;

final class Latitude extends BaseValueObject
{
    public function __construct(
        public readonly ?float $latitude
    ) {
        if (!$latitude) {
            throw new RequiredException('Latitude');
        }

        if ($latitude < -90) {
            throw new \LogicException('Latitude cannot be less that -90.0');
        }

        if ($latitude > 90) {
            throw new \LogicException('Latitude cannot be greater that 90.0');
        }
    }

    public function __toString(): string
    {
        return (string) $this->latitude;
    }

    public static function fromString(string $value): self
    {
        if (!preg_match('/^\d+(\.\d+)?$/', $value)) {
            throw new InvalidFormatException($value);
        }

        return new Latitude((float) $value);
    }

    public function jsonSerialize(): string
    {
        return (string) $this->latitude;
    }
}
