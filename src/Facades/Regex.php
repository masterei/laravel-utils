<?php

namespace Masterei\Utils\Facades;

use Illuminate\Support\Facades\Facade;

class Regex extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'utility-regex';
    }
}
