<?php

namespace App\Helpers;

class AcademicTranscriptGradeFormatIS
{
    public static function format($mark)
    {
        switch ($mark)
        {
            case ($mark >= 91 && $mark <= 100) || $mark == "A*" :
                return "A*";
            case ($mark >= 81 && $mark < 91) || $mark == "A" :
                return "A";
            case ($mark >= 61 && $mark < 81) || $mark == "B" :
                return "B";
            case ($mark >= 41 && $mark < 61) || $mark == "C" :
                return "C";
            case ($mark >= 21 && $mark < 41) || $mark == "D" :
                return "D";
            case ($mark >= 0 && $mark < 21) || $mark == "E" :
                return "E";
            case $mark == "-" || $mark == "F" :
                return "F";
            default :
                return "Error";
        }
    }
}
