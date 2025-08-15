<?php

    function daysWork($year, $month) {
        $daysMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        // Первое число месяца - это первый рабочий день.
        $workDays = 1;
        
        for ($day = 1; $day <= $daysMonth; $day++) {
            $date = "$year-$month-$day";
            $dayOfWeek = date('N', strtotime($date));
            
            if ($workDays == 1) {
                echo ($date . " + " . PHP_EOL);
                $workDays++;
                $day += 2;
                continue;
            }
            if ($dayOfWeek <= 5) {
                echo ($date . " + " . PHP_EOL);
                $workDays++;
                $day += 2;
            } else {
                echo ($date . PHP_EOL);
            }
        }
    }

    $year = 2025;
    $month = 9;
    $workingDays = daysWork($year, $month);