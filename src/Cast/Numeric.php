<?php

namespace Masterei\Utils\Cast;

trait Numeric
{
    public static function onlyDigits(string $string, string $regex = '\D'): int
    {
        return preg_replace("/$regex/", '', $string);
    }
}
