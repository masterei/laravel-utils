<?php

namespace Masterei\Utils\Cast;

use Masterei\Utils\Position;

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

    private static function ellipsis(string $string, int $max_length, string $position, int $dot_length): string
    {
        $str_len = strlen($string);

        if($str_len > $max_length) {
            switch ($position) {
                case Position::LEFT:
                    $string = str_repeat('.', $dot_length)
                        . trim(substr($string, ($str_len - $max_length) + $dot_length, $str_len));
                    break;

                case Position::CENTER:
                    $one_end = round($max_length / 2) - round($dot_length / 2);
                    $two_start = round($str_len - $one_end) - round($dot_length / 2);

                    // process string len to match max len limit
                    $diff = $str_len - ($one_end + $two_start);
                    if ($diff > 0) {
                        $two_start += $diff;
                    } elseif ($diff < 0) {
                        $two_start -= $diff;
                    }

                    $string = trim(substr($string, 0, $one_end))
                        . str_repeat('.', $dot_length)
                        . trim(substr($string, $two_start, $str_len));
                    break;

                case Position::RIGHT:
                    $string = trim(substr($string, 0, ($max_length - $dot_length))) . str_repeat('.', $dot_length);
                    break;
            }
        }

        return $string;
    }

    public static function ellipsisLeft(string $string, int $max_length = 30, int $dot_length = 3): string
    {
        return self::ellipsis($string, $max_length, Position::LEFT, $dot_length);
    }

    public static function ellipsisCenter(string $string, int $max_length = 30, int $dot_length = 3): string
    {
        return self::ellipsis($string, $max_length, Position::CENTER, $dot_length);
    }

    public static function ellipsisRight(string $string, int $max_length = 30, int $dot_length = 3): string
    {
        return self::ellipsis($string, $max_length, Position::RIGHT, $dot_length);
    }
}
