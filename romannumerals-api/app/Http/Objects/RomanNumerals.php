<?php

namespace App\Http\Objects;

class RomanNumerals implements RomanNumeralsInterface
{

    private static $listRomanToNumbers = 
    [      

        "L̅"   => 50000,
        "X̅L̅"  => 40000,
        "X̅X̅X̅" => 30000,
        "X̅X̅"  => 20000,
        "X̅"   => 10000,
        "ĪX̅"  => 9000,
        "V̅"   => 5000,
        "ĪV̅"  => 4000,
        "M"   => 1000,
        "CM"  => 900,
        "D"   => 500,
        "CD"  => 400,
        "C"   => 100,
        "XC"  => 90,
        "L"   => 50,
        "XL"  => 40,
        "X"   => 10,
        "IX"  => 9,
        "V"   => 5,
        "IV"  => 4,
        "I"   => 1

    ];

    public static function getAll()
    {

        return self::$listRomanToNumbers;

    }

}