<?php

    namespace App\Helpers;

    class ReportCardGradeFormatPreUni
    {
        public static function format($mark,$program)
        {
            if($program == "igcse")
            {
                if(is_numeric($mark))
                {
                    if((int)$mark >= 90 && (int)$mark <= 100)
                    {
                        return "A*";
                    }
                    elseif((int)$mark >= 80 && (int)$mark <= 89)
                    {
                        return "A";
                    }
                    elseif ((int)$mark >= 70 && (int)$mark <= 79)
                    {
                        return "B";
                    }
                    elseif ((int)$mark >= 60 && (int)$mark <= 69)
                    {
                        return "C";
                    }
                    elseif ((int)$mark >= 50 && (int)$mark <= 59)
                    {
                        return "D";
                    }
                    elseif ((int)$mark >= 40 && (int)$mark <= 49)
                    {
                        return "E";
                    }
                    elseif ((int)$mark >= 30 && (int)$mark <= 39)
                    {
                        return "F";
                    }
                    elseif ((int)$mark >= 20 && (int)$mark <= 29)
                    {
                        return "G";
                    }
                    elseif ((int)$mark >= 0 && (int)$mark <= 19)
                    {
                        return "U";
                    }
                }
                else
                {
                    return $mark;
                }
            }
            else if($program == "ged")
            {
                if(is_numeric($mark))
                {
                    if((int)$mark >= 175 && (int)$mark <= 200)
                    {
                        return "College Ready + Credit";
                    }
                    elseif((int)$mark >= 165 && (int)$mark <= 174)
                    {
                        return "College Ready";
                    }
                    elseif ((int)$mark >= 145 && (int)$mark <= 164)
                    {
                        return "Passing";
                    }
                    elseif ((int)$mark >= 100 && (int)$mark <= 144)
                    {
                        return "Below Passing";
                    }
                }
                else
                {
                    return $mark;
                }
            }
        }
    }
