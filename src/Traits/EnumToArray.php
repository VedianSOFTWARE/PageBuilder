<?php


namespace VedianSOFTWARE\VedianSOFTWARE\VedianCMS\Traits;


trait EnumToArray
{
    public static function value($value): string
    {
        return static::tryFrom($value)->value;
    }
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }
}
