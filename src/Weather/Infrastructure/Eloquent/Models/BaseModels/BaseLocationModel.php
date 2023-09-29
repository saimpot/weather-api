<?php

declare(strict_types = 1);

namespace WeatherApi\Core\Weather\Infrastructure\Eloquent\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class BaseLocationModel extends Model
{
    public const DATABASE_TABLE = 'locations';

    public const COLUMN_NAME = 'name';
    public const COLUMN_LATITUDE = 'latitude';
    public const COLUMN_LONGITUDE = 'longitude';
    public const COLUMN_IS_ACTIVE = 'is_active';
    public const COLUMN_CREATED_AT = self::CREATED_AT;
    public const COLUMN_UPDATED_AT = self::UPDATED_AT;

    protected $table = self::DATABASE_TABLE;

    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_LATITUDE,
        self::COLUMN_LONGITUDE,
        self::COLUMN_IS_ACTIVE,
    ];
}
