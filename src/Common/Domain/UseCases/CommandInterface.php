<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Common\Domain\UseCases;

interface CommandInterface
{
    public function execute(): mixed;
}
