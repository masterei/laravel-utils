<?php

namespace Masterei\Utils;

class Regex
{
    const DIGITS = 'regex:/[0-9]/';

    public static function onlyDigits(string $string, string $regex = '\D'): int
    {
        return preg_replace("/$regex/", '', $string);
    }
}
