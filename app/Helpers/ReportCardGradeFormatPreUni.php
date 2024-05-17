<?php

    namespace App\Helpers;

    class ReportCardGradeFormatPreUni
    {
        public static function format($mark,$baseMark)
        {
            if($baseMark == "80marks")
            {
                if(is_numeric($mark))
                {
                    if((int)$mark >= 61 && (int)$mark <= 80)
                    {
                        return "A";
                    }
                    elseif((int)$mark >= 41 && (int)$mark <= 60)
                    {
                        return "B";
                    }
                    elseif ((int)$mark >= 21 && (int)$mark <= 40)
                    {
                        return "C";
                    }
                    elseif ((int)$mark >= 0 && (int)$mark <= 20)
                    {
                        return "D";
                    }
                }
                else
                {
                    return $mark;
                }
            }
            else if($baseMark == "50marks")
            {
                if(is_numeric($mark))
                {
                    if((int)$mark >= 31 && (int)$mark <= 50)
                    {
                        return "A";
                    }
                    elseif((int)$mark >= 16 && (int)$mark <= 30)
                    {
                        return "B";
                    }
                    elseif ((int)$mark >= 0 && (int)$mark <= 15)
                    {
                        return "C";
                    }
                }
                else
                {
                    return $mark;
                }
            }
        }
    }
