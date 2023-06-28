<?php

namespace Masterei\Utils\Cast;

use Carbon\Carbon;

trait Date
{
    private static function parseDate(string $date, string $format, string | null $base_format = null): string
    {
        return empty($base_format)
            ? Carbon::parse($date)->format($format)
            : Carbon::createFromFormat($base_format, $date)->format($format);
    }

    public static function parseDateToYmd(string $date, string $format = 'Y-m-d', string | null $base_format = null): string
    {
        return self::parseDate($date, $format, $base_format);
    }

    public static function parseDateToFdy(string $date, string $format = 'F d, Y', string $base_format = null): string
    {
        return self::parseDate($date, $format, $base_format);
    }

    public static function parseDateToFdyHisA(string $date, string $format = 'F d, Y h:i:s A', string $base_format = null): string
    {
        return self::parseDate($date, $format, $base_format);
    }

    private static function parseExcelDate(int $date, string $format): string
    {
        $unix_date = ($date - 25569) * 86400;
        $date = 25569 + ($unix_date / 86400);
        $unix_date = ($date - 25569) * 86400;

        return gmdate($format, $unix_date);
    }

    public static function excelDateToYmd(int $date, string $format = 'Y-m-d'): string
    {
        return self::parseExcelDate($date, $format);
    }

    public static function excelDateToFdy(int $date, string $format = 'F d, Y'): string
    {
        return self::parseExcelDate($date, $format);
    }
}
