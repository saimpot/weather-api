<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Application\UseCases\Command;

use WeatherApi\Core\Common\Domain\UseCases\CommandInterface;
use WeatherApi\Core\Weather\Domain\Entity\Location;
use WeatherApi\Core\Weather\Domain\Mapper\LocationMapper;
use WeatherApi\Core\Weather\Infrastructure\Repository\Command\LocationCommandRepository;

class CreateLocationCommand implements CommandInterface
{
    private LocationCommandRepository $repository;
    private LocationMapper $locationMapper;

    public function __construct(
        private readonly Location $location
    ) {
        $this->repository = app(LocationCommandRepository::class);
        $this->locationMapper = app(LocationMapper::class);
    }

    public function execute(): Location
    {
        return $this->locationMapper->toEntity($this->repository->store($this->location));
    }
}
