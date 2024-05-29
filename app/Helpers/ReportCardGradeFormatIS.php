<?php
    namespace App\Helpers;
    class ReportCardGradeFormatIS
    {
        public static function format($mark)
        {
            if(is_numeric($mark))
            {
                if((int)$mark >= 81 && (int)$mark <= 100)
                {
                    return "A";
                }
                elseif((int)$mark >= 61 && (int)$mark < 81)
                {
                    return "B";
                }
                elseif ((int)$mark >= 41 && (int)$mark < 61)
                {
                    return "C";
                }
                elseif ((int)$mark >= 21 && (int)$mark < 41)
                {
                    return "D";
                }
                elseif ((int)$mark >= 0 && (int)$mark < 21)
                {
                    return "E";
                }
            }
            else
            {
                return $mark;
            }
        }
    }
