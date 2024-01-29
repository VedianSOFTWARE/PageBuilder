<?php

namespace VedianSoft\VedianCms\Enumerations;

use VedianSoft\VedianCms\Traits\EnumToArray;

enum Visibility: string
{
    use EnumToArray;

    case PUBLIC = 'public';
    case PRIVATE = 'private';

    public function is(): string
    {
        return match ($this) {
            Visibility::PUBLIC => 'public',
            Visibility::PRIVATE => 'private',
        };
    }

    public static function getValues(): array
    {
        return [
            Visibility::PUBLIC->value,
            Visibility::PRIVATE->value,
        ];
    }
}
