<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Common\Domain\ValueObject;

abstract class FloatValueObject extends BaseValueObject
{
    abstract public static function fromString(string $value): self;
    abstract public function jsonSerialize(): mixed;
}
