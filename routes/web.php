<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Route;

Route::get('/', static fn () => sprintf('This application does not have a front-end. Use the API: %s', env('API_URL')));
