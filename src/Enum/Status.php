<?php

namespace VedianCMS\Enum;

enum Status: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
    case DELETED = 'deleted';

    public static function schema(): array
    {
        return [
            self::DRAFT->name => self::DRAFT->value,
            self::PUBLISHED->name => self::PUBLISHED->value,
            self::ARCHIVED->name => self::ARCHIVED->value,
            self::DELETED->name => self::DELETED->value,
        ];
    }

    public static function draft(): string
    {
        return self::DRAFT->value;
    }

    public static function published(): string
    {
        return self::PUBLISHED->value;
    }

    public static function archived(): string
    {
        return self::ARCHIVED->value;
    }

    public static function deleted(): string
    {
        return self::DELETED->value;
    }
}
