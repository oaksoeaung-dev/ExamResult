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
                elseif(in_array($mark,range(80,90)))
                {
                    return "A";
                }
                elseif(in_array($mark,range(60,79)))
                {
                    return "B";
                }
                elseif(in_array($mark,range(40,59)))
                {
                    return "C";
                }
                elseif(in_array($mark,range(20,39)))
                {
                    return "D";
                }
                elseif(in_array($mark,range(0,19)))
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
