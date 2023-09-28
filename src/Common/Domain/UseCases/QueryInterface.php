<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Common\Domain\UseCases;

interface QueryInterface
{
    public function handle(): mixed;
}
