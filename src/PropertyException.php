<?php

namespace Masterei\Utils;

class PropertyException
{
    /**
     * Iterates nested array or object then replaces the
     * declared property value into null or with user define value.
     */

    protected array | object $data;

    protected array $exempted_property;

    protected string | null $replace_value;

    public function __construct(array | object $data, array $exempted_property, string | null $replace_value = null)
    {
        $this->data = $data;
        $this->exempted_property = $exempted_property;
        $this->replace_value = $replace_value;
    }

    public static function filter(array | object $data, array $exempted_property, string | null $replace_value = null): self
    {
        return new self($data, $exempted_property, $replace_value);
    }

    protected function isExemptedProperty(string $key): bool
    {
        foreach ($this->exempted_property as $value){
            if(is_array($value)){
                if($value['contains'] && str_contains($key, $value['key'])){
                    return true;
                }

                continue;
            }

            // simple property comparison
            if($key == $value){
                return true;
            }
        }

        return false;
    }

    protected function iterate(mixed $data)
    {
        foreach ($data as $key => $value){
            if($this->isExemptedProperty($key)){
                if(is_array($data)){
                    $data[$key] = $this->replace_value;
                    continue;
                }

                // object type
                $data->{$key} = $this->replace_value;
            } else {
                if(is_array($value) || is_object($value)){
                    // ensuring if given data is array or object type
                    if(is_array($data)){
                        $data[$key] = $this->iterate($value);
                        continue;
                    }

                    // object type
                    $data->{$key} = $this->iterate($value);
                }
            }
        }

        return $data;
    }

    public function get()
    {
        return $this->iterate($this->data);
    }
}
