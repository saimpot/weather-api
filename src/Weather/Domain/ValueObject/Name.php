<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\ValueObject;

use WeatherApi\Core\Common\Domain\Exception\RequiredException;
use WeatherApi\Core\Common\Domain\ValueObject\BaseValueObject;
use WeatherApi\Core\Weather\Domain\Exception\InvalidFormatException;

final class Name extends BaseValueObject
{
    public function __construct(
        public readonly string $name
    ) {
        if (empty($name)) {
            throw new RequiredException('Name');
        }

        if (!preg_match('/^[a-zA-Z0-9.]+$/', $name)) {
            throw new InvalidFormatException($name);
        }
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): string
    {
        return $this->name;
    }

    public static function fromString(string $value): self
    {
        return new Name($value);
    }
}
