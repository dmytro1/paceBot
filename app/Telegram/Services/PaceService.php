<?php

namespace App\Telegram\Services;

class PaceService
{
    /**
     * Calculates expected pace based on expected time and distance.
     * Time format: hh:mm:ss (21:40)
     * Distance format: km (5,5 -> 5.5; 5, 0.2)
     *
     * @param $splitMessage
     * @return string
     */
    public function paceResult($splitMessage): string
    {
        $expectedTime = $splitMessage[0];
        $distance = floatval(str_replace(',', '.', $splitMessage[1]));

        $paceInSeconds = $this->parseTime($expectedTime) / $distance;

        $pace = gmdate('i:s', $paceInSeconds);

        return "Відстань: $distance km\nЧас: $expectedTime\nТемп треба: <b>$pace min/km</b>";
//        return "Distance: $distance km\nTime: $expectedTime\nExpected pace: <b>$pace min/km</b>";
    }

    /**
     * Calculates expected time based on expected pace and distance.
     * Pace format: mm:ss (4:30)
     * Distance format: km (5,5 -> 5.5; 5, 0.2)
     *
     * @param $splitMessage
     * @return string
     */
    public function timeResult($splitMessage): string
    {
        $distance = floatval(str_replace(',', '.', $splitMessage[0]));
        $expectedPace = $splitMessage[1];

        $expectedTimeInSeconds = $distance * $this->parseTime($expectedPace);

        $expectedTime = gmdate(($expectedTimeInSeconds >= 3600) ? 'H:i:s' : 'i:s', $expectedTimeInSeconds);

        $metric = ($expectedTimeInSeconds >= 3600) ? ' h' : ($expectedTimeInSeconds >= 60 ? ' min' : ' sec');

//        $d = "Distance: " . ($distance > 1 ? $distance . " km\n" : $distance * 1000 . " m\n");
//        $p = "Pace: $expectedPace min/km\n";
//        $t = 'Expected time: <b>' . $expectedTime . $metric . '</b>';
        $d = "Відстань: " . ($distance > 1 ? $distance . " km\n" : $distance * 1000 . " m\n");
        $p = "Темп: $expectedPace min/km\n";
        $t = 'Час буде: <b>' . $expectedTime . $metric . '</b>';

        return $d . $p . $t;
    }

    private function parseTime($time): int
    {
        $parse = explode(':', $time);

        $resultSeconds = 0;

        foreach ($parse as $value) {
            $resultSeconds = $resultSeconds * 60 + intval($value);
        }

        return $resultSeconds;
    }
}
