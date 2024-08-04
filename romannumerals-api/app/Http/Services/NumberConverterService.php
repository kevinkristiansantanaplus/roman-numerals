<?php

namespace App\Http\Services;

use App\Http\Objects\RomanNumerals;

class NumberConverterService
{

    public function convertToNumeral($letters)
    {

        $numeral    = 0;
        $letters    = strtoupper($letters);
        $qtdLetters = str_split($letters);

        for($i = 0; $i < count($qtdLetters); $i++)
        {

            foreach(RomanNumerals::getAll() as $romanNumber => $number)
            {

                if($letters[$i] == $romanNumber)
                {

                    $numeral += $number;

                }

            }

        }

        return $numeral;

    }

    public function convertToRoman($number)
    {

        $numbersRoman = '';

        foreach(RomanNumerals::getAll() as $romanNumber => $value)
        {

            while($number >= $value)
            {

                $numbersRoman .= $romanNumber;
                $number       -= $value;

            }

        }

        return $numbersRoman;

    }

}