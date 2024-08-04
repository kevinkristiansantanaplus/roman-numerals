<?php

use App\Http\Controllers\NumberConverterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('numeral-roman/{decimal}', [NumberConverterController::class, 'numeralToRoman']);

Route::get('roman-numeral/{letters}', [NumberConverterController::class, 'romanToNumeral']);