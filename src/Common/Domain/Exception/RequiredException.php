<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Common\Domain\Exception;

use DomainException;

final class RequiredException extends DomainException
{
    public function __construct(string $fieldName)
    {
        parent::__construct(trans('validation.required', ['attribute' => $fieldName]));
    }
}
