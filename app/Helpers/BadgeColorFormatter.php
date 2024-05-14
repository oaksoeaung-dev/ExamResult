<?php

namespace App\Helpers;

class BadgeColorFormatter
{
    public static function format ($condition) : string
    {
        $badgeColor = "";
        switch($condition)
        {
            case "create":
                $badgeColor = "badge-green";
                break;
            case "read":
                $badgeColor = "badge-sky";
                break;
            case "update":
                $badgeColor = "badge-yellow";
                break;
            case "delete":
                $badgeColor = "badge-rose";
                break;
            default :
                $badgeColor = "";
        }

        return $badgeColor;
    }
}