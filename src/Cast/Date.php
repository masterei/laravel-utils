<?php

namespace Masterei\Utils\Cast;

use Carbon\Carbon;

trait Date
{
    private static function parseDate(string | null $date, string $format, string | null $base_format = null): string | null
    {
        // null date
        if(empty($date)){
            return null;
        }

        return empty($base_format)
            ? Carbon::parse($date)->format($format)
            : Carbon::createFromFormat($base_format, $date)->format($format);
    }

    public static function parseDateToYmd(string | null $date, string | null $base_format = null): string | null
    {
        return self::parseDate($date, 'Y-m-d', $base_format);
    }

    public static function parseDateToFdy(string | null $date, string $base_format = null): string | null
    {
        return self::parseDate($date, 'F d, Y', $base_format);
    }

    public static function parseDateToFdyHisA(string | null $date, string $base_format = null): string | null
    {
        return self::parseDate($date, 'F d, Y h:i:s A', $base_format);
    }

    public static function parseDateFdyToYmd(string | null $date , string $base_format = 'F d, Y'): string | null
    {
        return self::parseDate($date, 'Y-m-d', $base_format);
    }

    private static function parseExcelDate(int | null $date, string $format): string | null
    {
        // null date
        if(empty($date)){
            return null;
        }

        $unix_date = ($date - 25569) * 86400;
        $date = 25569 + ($unix_date / 86400);
        $unix_date = ($date - 25569) * 86400;

        return gmdate($format, $unix_date);
    }

    public static function excelDateToYmd(int | null $date, string $format = 'Y-m-d'): string | null
    {
        return self::parseExcelDate($date, $format);
    }

    public static function excelDateToFdy(int| null $date, string $format = 'F d, Y'): string | null
    {
        return self::parseExcelDate($date, $format);
    }
}
