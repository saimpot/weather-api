<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Common\Entity;

abstract class AbstractEntity
{
    abstract public function toArray(): array;
}
