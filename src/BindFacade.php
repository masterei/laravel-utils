<?php

namespace Masterei\Utils;

class BindFacade
{
    public static function bind($instance, array $classes = []): void
    {
        foreach ($classes as $key => $class){
            $instance->app->bind($key, function () use ($class) {
                return new $class();
            });
        }
    }
}
