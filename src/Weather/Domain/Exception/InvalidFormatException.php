<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Domain\Exception;

final class InvalidFormatException extends \DomainException
{
    public function __construct(string $value)
    {
        parent::__construct(sprintf('Invalid format for %s: %s', $this->getTrace()[0]['file'], $value));
    }
}
