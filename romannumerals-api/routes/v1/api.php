<?php

use App\Http\Controllers\NumberConverterController;
use Illuminate\Support\Facades\Route;

Route::get('arabic-to-roman/{decimal}', [NumberConverterController::class, 'arabicToRoman']);

Route::get('roman-to-arabic/{letters}', [NumberConverterController::class, 'romanToArabic']);