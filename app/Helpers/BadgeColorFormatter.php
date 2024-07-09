<?php

namespace App\Helpers;

class BadgeColorFormatter
{
    public static function format($condition): string
    {
        $badgeColor = "";
        switch ($condition) {
            case "active":
                $badgeColor = "badge-green";
                break;
            case "disable":
                $badgeColor = "badge-zinc";
                break;
            case "administrator":
                $badgeColor = "badge-red";
                break;
            case "user":
                $badgeColor = "badge-sky";
                break;
            case "guest":
                $badgeColor = "badge-zinc";
                break;
            default:
                $badgeColor = "";
        }

        return $badgeColor;
    }
}
