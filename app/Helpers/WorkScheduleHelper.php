<?php

namespace App\Helpers;

use Carbon\Carbon;

class WorkScheduleHelper
{
    public static function isWorkHour(Carbon $time)
    {
        $hour = (int) $time->format('H');
        $minute = (int) $time->format('i');

        return ($hour >= 9 && $hour < 12) || ($hour >= 13 && $hour < 18) || ($hour == 12 && $minute == 0);
    }
}
