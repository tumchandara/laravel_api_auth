<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function generate()
    {
        $lotteryNumbers = [];

        for ($digit1 = 0; $digit1 <= 9; $digit1++) {
            for ($digit2 = 0; $digit2 <= 9; $digit2++) {
                for ($digit3 = 0; $digit3 <= 9; $digit3++) {
                    for ($digit4 = 0; $digit4 <= 9; $digit4++) {
                        // Generate a 4-digit number
                        $number = "$digit1$digit2$digit3$digit4";

                        // If 4 digits are different, add to the list
                        if ($this->hasDifferentDigits($number)) {
                            $lotteryNumbers[] = $number;
                        }

                        // If 2 digits are the same and 2 are different
                        if ($this->hasTwoSameAndTwoDifferentDigits($number)) {
                            $lotteryNumbers[] = $number;
                        }

                        // If there are two pairs
                        if ($this->hasTwoPairs($number)) {
                            $lotteryNumbers[] = $number;
                        }

                        // If 3 digits are the same
                        if ($this->hasThreeSameDigits($number)) {
                            $lotteryNumbers[] = $number;
                        }

                        // If 4 digits are the same
                        if ($this->hasFourSameDigits($number)) {
                            $lotteryNumbers[] = $number;
                        }
                    }
                }
            }
        }

        return response()->json(['lottery_numbers' => $lotteryNumbers], 200);
    }

    private function hasDifferentDigits($number)
    {
        $uniqueDigits = count(array_unique(str_split($number)));
        return $uniqueDigits === 4;
    }

    private function hasTwoSameAndTwoDifferentDigits($number)
    {
        $uniqueDigits = count(array_unique(str_split($number)));
        return $uniqueDigits === 3;
    }

    private function hasTwoPairs($number)
    {
        $uniqueDigits = count(array_unique(str_split($number)));
        if ($uniqueDigits === 2) {
            $counts = array_count_values(str_split($number));
            return in_array(2, $counts);
        }
        return false;
    }

    private function hasThreeSameDigits($number)
    {
        $uniqueDigits = count(array_unique(str_split($number)));
        if ($uniqueDigits === 2) {
            $counts = array_count_values(str_split($number));
            return in_array(3, $counts);
        }
        return false;
    }

    private function hasFourSameDigits($number)
    {
        return count(array_unique(str_split($number))) === 1;
    }

}

