<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Presentation\Api\Controllers\Location\Write;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use WeatherApi\Core\Weather\Application\UseCases\Command\CreateLocationCommand;
use WeatherApi\Core\Weather\Domain\Mapper\LocationMapper;

class CreateLocationController
{
    public function __invoke(Request $request): JsonResponse
    {
        $location = (new CreateLocationCommand(LocationMapper::fromRequest($request)))->execute();

        return response()->json([
            'success' => true,
            'message' => 'Location created.',
            'data'    => [
                'location' => $location,
            ],
        ]);
    }
}
