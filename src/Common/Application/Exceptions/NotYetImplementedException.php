<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Common\Application\Exceptions;

use DomainException;

final class NotYetImplementedException extends DomainException
{
    public function __construct()
    {
        parent::__construct('[NYI] This feature has not been implemented yet.');
    }
}
