<?php

namespace App\Http\Services;

use App\Http\Objects\RomanNumerals;

class NumberConverterService
{

    public function convertToNumeral($letters)
    {

        $numeral = 0;
        $letters = strtoupper($letters);
        $arrayLetters = strlen($letters);
    
        $numbersRoman = RomanNumerals::getAll();
    
        for($i = 0; $i < $arrayLetters; $i++) {
    
            $currentLetter = $letters[$i];

            $number = isset($numbersRoman[$currentLetter]) ? $numbersRoman[$currentLetter] : 0;

            $nextNumber = ($i + 1 < $arrayLetters) ? $numbersRoman[$letters[$i + 1]] : 0;
    
            if ($number < $nextNumber) {

                $numeral -= $number;

            } 
            else 
            {

                $numeral += $number;

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