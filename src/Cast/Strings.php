<?php

namespace Masterei\Utils\Cast;

trait Strings
{
    public static function explodeAndTrim(string $data, string $separator = ','): array
    {
        return array_map('trim', explode($separator, $data));
    }

    public static function omitSpaces(string $string): string
    {
        return str_replace(' ', '', $string);
    }

    public static function sanitizeFileName(string $filename): string
    {
        return preg_replace("/[^A-Za-z0-9]/", '_', $filename);
    }
}
