<?php

namespace App\Http\Controllers;

use App\Http\Services\NumberConverterService;
use Illuminate\Http\Request;

class NumberConverterController extends Controller
{

    private $numberConverterService;

    public function __construct(NumberConverterService $numberConverterService) {

        $this->numberConverterService = $numberConverterService;

    }

    public function numeralToRoman($decimal)
    {

        $number = $decimal;

        if($number > 50000)
        {

            return response()->json([

                'message' => 'Insira um número menor que 50000.',
                'status'  => 400

            ]);

        }

        try
        {

            $letters = $this->numberConverterService->convertToRoman($number);

            return response()->json([

                'message'  => 'Dados recuperados com sucesso.',
                'numerals' => $letters,
                'status'   => 200,
                'data'     => [

                    'roman'  => $letters,
                    'number' => $number

                ]

            ]);

        }
        catch(\Exception $e)
        {

            return response()->json([

                'message' => 'Houve um erro no servidor, favor contatar o suporte',
                'status'  => 500

            ]);

        }

    }

    public function romanToNumeral(Request $request)
    {

        $letters = $request->letters;

        $validLetter = validLettersRoman($letters);

        if(!$validLetter)
        {

            return response()->json([

                'message' => 'Insira um número em romano válido.',
                'status'  => 400

            ]);

        }

        try
        {

            $number = $this->numberConverterService->convertToNumeral($letters);

            return response()->json([

                'message'  => 'Dados recuperados com sucesso.',
                'status'   => 200,
                'data'     => [

                    'roman'  => $letters,
                    'number' => $number

                ]

            ]);

        }
        catch(\Exception $e)
        {

            return response()->json([

                'message'  => 'Houve um erro no servidor, favor contatar o suporte',
                'status'   => 500

            ]);

        }

    }

}