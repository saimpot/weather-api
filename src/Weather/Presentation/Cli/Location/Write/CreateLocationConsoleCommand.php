<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Presentation\Cli\Location\Write;

use Illuminate\Console\Command;
use WeatherApi\Core\Weather\Application\UseCases\Command\CreateLocationCommand;
use WeatherApi\Core\Weather\Domain\Entity\Location;
use WeatherApi\Core\Weather\Domain\ValueObject\Active;
use WeatherApi\Core\Weather\Domain\ValueObject\Coordinates;
use WeatherApi\Core\Weather\Domain\ValueObject\Name;

class CreateLocationConsoleCommand extends Command
{
    protected $signature = 'location:create {name : Name of the location} {coordinates : Coordinates in the form of "x.xx, y.yy"} {is_active=false : Is this location active?}';
    protected $description = 'This command is used create a location for fetching weather purposes';

    public function handle(): int
    {
        $name = $this->argument('name');
        $coordinates = $this->argument('coordinates');
        $isActive = $this->argument('is_active');

        try {
            $locationEntity = new Location(
                null,
                Name::fromString($name),
                Coordinates::fromString($coordinates),
                Active::fromString($isActive)
            );

            (new CreateLocationCommand($locationEntity))->execute();

            $this->info("Location: {$name} ({$coordinates}) created.");

            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Something unexpected happened. Could not create location.');

            if (env('APP_ENV') !== 'production') {
                $this->newLine()->error("More info: ({$e->getCode()}) {$e->getMessage()}");
            }

            return self::FAILURE;
        }
    }
}
