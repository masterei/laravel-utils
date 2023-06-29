<?php

namespace Masterei\Utils;

class AttributeIndexes
{
    public static function populate(...$data): array
    {
        $attributes = [];

        if(count($data[0]) > 1){
            foreach ($data[0] as $value){
                if(empty($value['data'])){
                    continue;
                }

                foreach ($value['data'] as $key => $value_2){
                    $attributes[$value['attribute'] . ".$key"] = $value['custom_name'] . " " . $key + 1;
                }

            }
        }

        return $attributes;
    }
}
