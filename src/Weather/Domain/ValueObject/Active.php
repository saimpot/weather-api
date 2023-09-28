<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\ValueObject;

use WeatherApi\Core\Common\Domain\Exception\RequiredException;
use WeatherApi\Core\Common\Domain\ValueObject\BaseValueObject;

final class Active extends BaseValueObject
{
    public function __construct(
        public readonly bool $is_active
    ) {
        if (empty($is_active)) {
            throw new RequiredException('is_active');
        }
    }

    public function __toString(): string
    {
        return (string) $this->is_active;
    }

    public function jsonSerialize(): string
    {
        return (string) $this->is_active;
    }

    public static function fromString(string $value): self
    {
        return new Active((bool) $value);
    }
}
