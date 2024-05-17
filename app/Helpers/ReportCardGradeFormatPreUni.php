<?php

    namespace App\Helpers;

    class ReportCardGradeFormatPreUni
    {
        public static function format($mark,$baseMark)
        {
            if($baseMark == "80marks")
            {
                switch ($mark)
                {
                    case ((int)$mark >= 61 && (int)$mark <= 80) || $mark == "A" :
                        return "A";
                    case ($mark >= 41 && $mark <= 60) || $mark == "B" :
                        return "B";
                    case ($mark >= 21 && $mark <= 40) || $mark == "C" :
                        return "C";
                    case ($mark >= 0 && $mark <= 20) || $mark == "D" :
                        return "D";
                    default :
                        return $mark;
                }
            }
            else if($baseMark == "50marks")
            {
                switch ($mark)
                {
                    case ($mark >= 31 && $mark <= 50) || $mark == "A" :
                        return "A";
                    case ($mark >= 16 && $mark <= 30) || $mark == "B" :
                        return "B";
                    case ($mark >= 0 && $mark <= 15) || $mark == "C" :
                        return "C";
                    default :
                        return $mark;
                }
            }
        }
    }
