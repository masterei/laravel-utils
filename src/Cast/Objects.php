<?php

namespace Masterei\Utils\Cast;

trait Objects
{
    public static function toJson(string $data): object
    {
        return json_decode(json_encode($data));
    }
}
