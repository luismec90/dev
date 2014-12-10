<?php

class Currency {

    public static function toFront($value, $simbol = '$')
    {
        return $simbol . ' ' . rtrim(rtrim(number_format($value, 2, ',', '.'), 0), ',');
    }

    public static function toBack($value)
    {
        return str_replace(".", "", $value);
    }
}