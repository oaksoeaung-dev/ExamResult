<?php
    namespace App\Helpers;
    class ReportCardGradeFormatIS
    {
        public static function format($mark)
        {
            if(is_numeric($mark))
            {
                if((int)$mark >= 80 && (int)$mark <= 100)
                {
                    return "A";
                }
                elseif((int)$mark >= 60 && (int)$mark < 80)
                {
                    return "B";
                }
                elseif ((int)$mark >= 40 && (int)$mark < 60)
                {
                    return "C";
                }
                elseif ((int)$mark >= 20 && (int)$mark < 40)
                {
                    return "D";
                }
                elseif ((int)$mark >= 0 && (int)$mark < 20)
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
