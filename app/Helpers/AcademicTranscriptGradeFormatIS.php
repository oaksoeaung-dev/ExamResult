<?php

    namespace App\Helpers;

    class AcademicTranscriptGradeFormatIS
    {
        public static function format($mark)
        {
            if (is_numeric($mark)) {
                if(in_array($mark,range(91,100)))
                {
                    return "A*";
                }
                elseif(in_array($mark,range(81,90)))
                {
                    return "A";
                }
                elseif(in_array($mark,range(61,80)))
                {
                    return "B";
                }
                elseif(in_array($mark,range(41,60)))
                {
                    return "C";
                }
                elseif(in_array($mark,range(21,40)))
                {
                    return "D";
                }
                elseif(in_array($mark,range(0,20)))
                {
                    return "E";
                }
                else{
                    return "ERROR";
                }
            } else {
                $grades = ["A*", "A", "B", "C", "D", "E", "F"];

                if(in_array($mark,$grades))
                {
                    return $mark;
                }
                elseif($mark == "-"){
                    return "F";
                }
                else{
                    return "ERROR";
                }
            }
        }
    }
