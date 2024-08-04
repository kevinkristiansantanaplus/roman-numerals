<?php

if (! function_exists('validLettersRoman')) {

    function validLettersRoman($letters)
    {

        $listLetters = count_chars($letters, 1);

        foreach($listLetters as $letter)
        {

            if($letter <= 3)
            {

                return true;

            }

        }

    }

}