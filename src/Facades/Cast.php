<?php

namespace Masterei\Utils\Facades;

use Illuminate\Support\Facades\Facade;

class Cast extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'utility-cast';
    }
}
