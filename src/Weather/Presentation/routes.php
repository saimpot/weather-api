<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Presentation;

use Illuminate\Support\Facades\Route;
use WeatherApi\Core\Weather\Presentation\Api\Controllers\Location\Write\CreateLocationController;

Route::prefix('weather')->group(function () {
    Route::get('health', static fn () => 'Everything seems fine.');

    // Location
    Route::post('location', CreateLocationController::class);
});
